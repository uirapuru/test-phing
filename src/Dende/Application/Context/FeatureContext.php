<?php
namespace Dende\Application\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use DateTime;
use Dende\Application\Command\CreateTask;
use Dende\Application\Factory\TaskFactory;
use Dende\Application\Factory\TodoListFactory;
use Dende\Application\Generator\UuidGenerator;
use Dende\Application\Handler\CreateTaskHandler;
use Dende\Application\Repository\InMemory\InMemoryListRepository;
use Dende\Application\Repository\InMemory\InMemoryTaskRepository;
use Dende\Domain\Task;
use Dende\Domain\TodoList;
use Symfony\Component\Config\Definition\Exception\Exception;

class FeatureContext extends MinkContext
{
    /** @var InMemoryListRepository */
    private $listRepository;

    /** @var InMemoryTaskRepository */
    private $taskRepository;

    /** @var  TodoList */
    private $currentList;

    /** @var Task */
    private $newTask;

    /** @var  CreateTaskHandler */
    private $createTaskHandler;

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
     * @When /^I push a new tasks to list "([^"]*)"$/
     */
    public function iPushANewTasksToList($listName, TableNode $table)
    {
        /** @var TodoList $list */
        $list = $this->listRepository->findOne(["title" => $listName]);

        foreach($table as $row)
        {
            $row["finished"] = $row["finished"] === "x" ? new Datetime($row["finished"]) : null;

            $createTaskCommand = new CreateTask();
            $createTaskCommand->title = $row["title"];
            $createTaskCommand->content = $row["content"];
            $createTaskCommand->finished = $row["finished"];
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

        $totalCount = count($list->tasks());

        if($totalCount !== (int) $expectedCount) {
            throw new Exception(sprintf(
                "Expected %d tasks in list '%s', but there is %d",
                $expectedCount,
                $listName,
                $totalCount
            ));
        }
    }
}