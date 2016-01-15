<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\TaskRepositoryInterface;
use Dende\Domain\Task;
use Doctrine\ORM\EntityRepository;

/**
 * Class TasksRepository
 * @package Dende\Bundle\AppBundle\Repository
 */
class TasksRepository extends EntityRepository implements TaskRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function insert(Task $task)
    {
        // TODO: Implement insert() method.
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
    public function findOne(array $parameters = [])
    {
        // TODO: Implement findOne() method.
    }
}