<?php
namespace Dende\Application\Factory;

use Dende\Domain\Task;

/**
 * Class TaskFactory
 * @package Dende\Application\Factory
 */
class TaskFactory
{
    /**
     * @param array $array
     * @return Task
     */
    public function createFromArray(array $array)
    {
        return new Task(
            $array["id"],
            $array["title"],
            $array["content"],
            $array["list"],
            $array["finished"],
            $array["deleted"]
        );
    }
}