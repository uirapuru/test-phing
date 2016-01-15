<?php
namespace Dende\Application\Repository\InMemory;

use Dende\Application\Repository\TaskRepositoryInterface;
use Dende\Domain\Task;

class InMemoryTaskRepository implements TaskRepositoryInterface
{
    use FilterTrait;

    /**
     * @var array|Task[]
     */
    private $tasks = [];

    /**
     * @inheritDoc
     */
    public function insert(Task $task)
    {
        $this->tasks[$task->id()] = $task;
    }

    /**
     * @inheritDoc
     */
    public function remove(Task $task)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function update(Task $task)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function findAll(array $parameters = [])
    {
        return $this->filterRepository($this->tasks, $parameters);
    }
}