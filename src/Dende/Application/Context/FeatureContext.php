<?php
namespace Dende\Application\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Dende\Application\Factory\TodoListFactory;
use Dende\Application\Repository\InMemory\InMemoryListRepository;
use Dende\Application\Repository\InMemory\InMemoryTaskRepository;
use Dende\Domain\Task;

class FeatureContext extends MinkContext
{
    /** @var InMemoryListRepository */
    private $listRepository;

    /** @var InMemoryTaskRepository */
    private $taskRepository;

    /** @var Task */
    private $newTask;

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
    }

    /**
     * @When /^I create a new task with data:$/
     */
    public function iCreateANewTaskWithData(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I put it on list named "([^"]*)"$/
     */
    public function iPutItOnListNamed($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^list "([^"]*)" counts "([^"]*)" tasks$/
     */
    public function listCountsTasks($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given /^there are "([^"]*)" tasks in database$/
     */
    public function thereAreTasksInDatabase($arg1)
    {
        throw new PendingException();
    }
}