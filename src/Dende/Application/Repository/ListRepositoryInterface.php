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
     * @return mixed
     */
    public function remove(TodoList $todoList);

    /**
     * @param TodoList $todoList
     * @return mixed
     */
    public function update(TodoList $todoList);

    /**
     * @param $id
     * @return mixed
     */
    public function find($parameters);
}