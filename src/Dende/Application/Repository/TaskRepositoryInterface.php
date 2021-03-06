<?php
namespace Dende\Application\Repository;

use Dende\Domain\Task;

interface TaskRepositoryInterface
{
    /**
     * @param Task $task
     */
    public function insert(Task $task);

    /**
     * @param Task $task
     */
    public function remove(Task $task);

    /**
     * @param Task $task
     */
    public function update(Task $task);

    /**
     * @param array $parameters
     *
     * @return Task[]|null
     */
    public function findAll(array $parameters = []);

    /**
     * @param array $parameters
     *
     * @return Task|null
     */
    public function findOne(array $parameters = []);
}
