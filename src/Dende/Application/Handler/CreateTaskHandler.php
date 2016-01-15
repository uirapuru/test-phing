<?php
namespace Dende\Application\Handler;

use Dende\Application\Command\CreateTask;
use Dende\Application\Factory\TaskFactory;
use Dende\Application\Generator\IdGeneratorInterface;
use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Application\Repository\TaskRepositoryInterface;
use Dende\Domain\TodoList;

/**
 * Class CreateTaskHandler
 * @package Dende\Application\Handler
 */
class CreateTaskHandler
{
    /** @var TaskRepositoryInterface */
    private $tasksRepository;

    /** @var ListRepositoryInterface */
    private $listsRepository;

    /** @var TaskFactory */
    private $taskFactory;

    /** @var IdGeneratorInterface */
    private $idGenerator;

    /**
     * CreateTaskHandler constructor.
     * @param TaskRepositoryInterface $tasksRepository
     * @param ListRepositoryInterface $listsRepository
     * @param TaskFactory $taskFactory
     * @param IdGeneratorInterface $idGenerator
     */
    public function __construct(TaskRepositoryInterface $tasksRepository, ListRepositoryInterface $listsRepository, TaskFactory $taskFactory, IdGeneratorInterface $idGenerator)
    {
        $this->tasksRepository = $tasksRepository;
        $this->listsRepository = $listsRepository;
        $this->taskFactory = $taskFactory;
        $this->idGenerator = $idGenerator;
    }

    /**
     * @param CreateTask $createTaskCommand
     */
    public function handle(CreateTask $createTaskCommand)
    {
        /** @var TodoList $list */
        $list = $this->listsRepository->findOne(["id" => $createTaskCommand->listId]);

        $task = $this->taskFactory->createFromArray([
            "id" => $this->idGenerator->generate(),
            "title" => $createTaskCommand->title,
            "content" => $createTaskCommand->content,
            "list" => $list,
            "finished" => null,
            "deleted" => null
        ]);

        $list->addTask($task);

        $this->tasksRepository->insert($task);
    }
}