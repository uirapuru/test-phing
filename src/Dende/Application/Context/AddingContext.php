<?php
namespace Dende\Application\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use DateTime;
use Dende\Application\Command\CreateTask;
use Dende\Application\Command\RemoveTask;
use Dende\Application\Command\UpdateTask;
use Dende\Application\Factory\TaskFactory;
use Dende\Application\Factory\TodoListFactory;
use Dende\Application\Generator\UuidGenerator;
use Dende\Application\Handler\CreateTaskHandler;
use Dende\Application\Handler\UpdateTaskHandler;
use Dende\Application\Repository\InMemory\InMemoryListRepository;
use Dende\Application\Repository\InMemory\InMemoryTaskRepository;
use Dende\Domain\Task;
use Dende\Domain\TodoList;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class AddingContext
 * @package Dende\Application\Context
 */
class AddingContext extends MinkContext
{
    /** @var InMemoryListRepository */
    private $listRepository;

    /** @var InMemoryTaskRepository */
    private $taskRepository;

    /** @var  TodoList */
    private $currentList;

    /** @var  CreateTaskHandler */
    private $createTaskHandler;

    /** @var UpdateTaskHandler */
    private $updateTaskHandler;

    /**
     * Initializes context.
     */
    public function __construct()
    {
        $this->listRepository = new InMemoryListRepository();
        $this->taskRepository = new InMemoryTaskRepository();

        $list = (new TodoListFactory())->createFromArray([
            "id" => "1",
            "title" => "Grzegorz",
            "tasks" => []
        ]);

        $this->listRepository->insert($list);
        $this->currentList = $list;

        $this->createTaskHandler = new CreateTaskHandler(
            $this->taskRepository,
            $this->listRepository,
            new TaskFactory(),
            new UuidGenerator()
        );

        $this->updateTaskHandler = new UpdateTaskHandler($this->taskRepository);
    }

    /**
     * @Given /^there are "([^"]*)" tasks in database$/
     */
    public function thereAreTasksInDatabase($expectedCount)
    {
        $totalCount = count($this->taskRepository->findAll());

        if($totalCount !== (int) $expectedCount) {
            throw new Exception(sprintf(
                "Expected %d tasks in db, but there is %d",
                $expectedCount,
                $totalCount
            ));
        }
    }

    /**
     * @Given /^there are already tasks with data on "([^"]*)" list:$/
     * @When /^I push a new tasks to list "([^"]*)"$/
     */
    public function iPushANewTasksToList($listName, TableNode $table)
    {
        /** @var TodoList $list */
        $list = $this->listRepository->findOne(["title" => $listName]);

        foreach($table as $row)
        {
            $createTaskCommand = new CreateTask();
            $createTaskCommand->title = $row["title"];
            $createTaskCommand->content = $row["content"];
            $createTaskCommand->finished = $row["finished"] !== "" ? new Datetime($row["finished"]) : null;
            $createTaskCommand->listId = $list->id();

            $this->createTaskHandler->handle($createTaskCommand);
        }
    }

    /**
     * @Then /^list "([^"]*)" counts "([^"]*)" tasks$/
     */
    public function listCountsTasks($listName, $expectedCount)
    {
        /** @var TodoList $list */
        $list = $this->listRepository->findOne(["title" => $listName]);
        $tasks = $this->taskRepository->findAll(["todoList" => $list]);

        $totalCount = count($tasks);

        if($totalCount !== (int) $expectedCount) {
            throw new Exception(sprintf(
                "Expected %d tasks in list '%s', but there is %d",
                $expectedCount,
                $listName,
                $totalCount
            ));
        }
    }

    /**
     * @Given /^list "([^"]*)" has "([^"]*)" tasks not done$/
     */
    public function listHasTasksNotDone($listName, $expectedCount)
    {
        /** @var TodoList $list */
        $list = $this->listRepository->findOne(["title" => $listName]);
        $totalCount = count($list->findNotFinishedTasks());

        if($totalCount !== (int) $expectedCount) {
            throw new Exception(sprintf(
                "Expected %d not finished tasks in list '%s', but there is %d",
                $expectedCount,
                $listName,
                $totalCount
            ));
        }
    }

    /**
     * @When /^I save task titled "([^"]*)" with new data$/
     */
    public function iSaveTaskTitledWithNewData($taskTitle, TableNode $table)
    {
        /** @var Task $list */
        $task = $this->taskRepository->findOne(["title" => $taskTitle]);

        foreach($table as $row)
        {
            $updateTaskCommand = new UpdateTask();
            $updateTaskCommand->id = $task->id();
            $updateTaskCommand->title = $row["title"];
            $updateTaskCommand->content = $row["content"];
            $updateTaskCommand->finished = $row["finished"] !== "" ? new Datetime($row["finished"]) : null;
            $updateTaskCommand->deleted = $row["deleted"] !== "" ? new Datetime($row["deleted"]) : null;
            $updateTaskCommand->listId = $task->todoList()->id();

            $this->updateTaskHandler->handle($updateTaskCommand);
        }
    }

    /**
     * @When /^I delete task titled "([^"]*)"$/
     */
    public function iDeleteTaskTitled($taskTitle)
    {
        /** @var Task $list */
        $task = $this->taskRepository->findOne(["title" => $taskTitle]);

        $removeTaskCommand = new RemoveTask();
        $removeTaskCommand->id = $task->id();
        $removeTaskCommand->deleted = new DateTime("now");

        $this->updateTaskHandler->handle($removeTaskCommand);
    }
}