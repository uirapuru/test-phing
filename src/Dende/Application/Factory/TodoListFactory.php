<?php
namespace Dende\Application\Factory;

use Dende\Domain\TodoList;

/**
 * Class TodoListFactory
 * @package Dende\Application\Factory
 */
class TodoListFactory
{
    /**
     * @param array $array
     * @return TodoList
     */
    public function createFromArray(array $array)
    {
        return new TodoList(
            $array["id"],
            $array["title"]
        );
    }
}