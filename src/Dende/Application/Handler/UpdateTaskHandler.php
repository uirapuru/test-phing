<?php
namespace Dende\Application\Handler;

use Dende\Application\Command\UpdateTask;
use Dende\Application\Repository\TaskRepositoryInterface;

/**
 * Class UpdateTaskHandler.
 */
class UpdateTaskHandler
{
    /** @var TaskRepositoryInterface */
    private $tasksRepository;

    /**
     * UpdateTaskHandler constructor.
     *
     * @param TaskRepositoryInterface $tasksRepository
     */
    public function __construct(TaskRepositoryInterface $tasksRepository)
    {
        $this->tasksRepository = $tasksRepository;
    }

    /**
     * @param UpdateTask $command
     */
    public function handle(UpdateTask $command)
    {
        $oldTask = $this->tasksRepository->findOne(['id' => $command->id]);
        $oldTask->updateWithCommand($command);

        // throw update event
    }
}
