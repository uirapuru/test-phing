<?php
namespace Dende\Application\Repository\InMemory;

use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Domain\TodoList;

/**
 * Class InMemoryListRepository
 * @package Dende\Application\Repository\InMemory
 */
class InMemoryListRepository implements ListRepositoryInterface
{
    private $lists;

    /**
     * @inheritDoc
     */
    public function insert(TodoList $todoList)
    {
        $this->lists[$todoList->id()] = $todoList;
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
    public function find($parameters)
    {
        // TODO: Implement find() method.
    }

}