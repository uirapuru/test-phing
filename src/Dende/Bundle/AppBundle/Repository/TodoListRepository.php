<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Domain\TodoList;
use Doctrine\ORM\EntityRepository;

/**
 * Class TodoListRepository
 * @package Dende\Bundle\AppBundle\Repository
 */
class TodoListRepository extends EntityRepository implements ListRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function insert(TodoList $todoList)
    {
        // TODO: Implement insert() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(TodoList $todoList)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function update(TodoList $todoList)
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