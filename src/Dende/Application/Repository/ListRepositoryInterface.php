<?php
namespace Dende\Application\Repository;

use Dende\Domain\TodoList;

/**
 * Interface ListRepositoryInterface
 * @package Dende\Application\Repository
 */
interface ListRepositoryInterface
{
    /**
     * @param TodoList $todoList
     * @return null
     */
    public function insert(TodoList $todoList);

    /**
     * @param TodoList $todoList
     * @return null
     */
    public function remove(TodoList $todoList);

    /**
     * @param TodoList $todoList
     * @return null
     */
    public function update(TodoList $todoList);

    /**
     * @param array $parameters
     * @return TodoList[]|null
     */
    public function findAll(array $parameters = []);

    /**
     * @param array $parameters
     * @return TodoList|null
     */
    public function findOne(array $parameters = []);
}