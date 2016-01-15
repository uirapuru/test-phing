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
     * {@inheritdoc}
     */
    public function insert(Task $task)
    {
        $this->tasks[$task->id()] = $task;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Task $task)
    {
        // TODO: Implement remove() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update(Task $task)
    {
        // TODO: Implement update() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(array $parameters = [])
    {
        return $this->filter($this->tasks, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Task|null
     */
    public function findOne(array $parameters = [])
    {
        $result = $this->findAll($parameters);
        if (count($result) > 0) {
            return array_pop($result);
        }
    }
}
