<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\TaskRepositoryInterface;
use Dende\Domain\Task;
use Doctrine\ORM\EntityRepository;

/**
 * Class TasksRepository.
 */
class TasksRepository extends EntityRepository implements TaskRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function insert(Task $task)
    {
        // TODO: Implement insert() method.
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
    public function findOne(array $parameters = [])
    {
        // TODO: Implement findOne() method.
    }
}
