<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Domain\TodoList;
use Doctrine\ORM\EntityRepository;

/**
 * Class TodoListRepository.
 */
class TodoListRepository extends EntityRepository implements ListRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function insert(TodoList $todoList)
    {
        // TODO: Implement insert() method.
    }

    /**
     * {@inheritdoc}
     */
    public function remove(TodoList $todoList)
    {
        // TODO: Implement remove() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update(TodoList $todoList)
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
