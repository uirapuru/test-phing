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
        $array = $this->prepareData($array);

        return new Task(
            $array["id"],
            $array["title"],
            $array["content"],
            $array["list"],
            $array["finished"],
            $array["deleted"]
        );
    }

    /**
     * @param $array
     * @return array
     */
    private function prepareData($array)
    {
        $template = [
            "id" => null,
            "title" => "",
            "content" => "",
            "list" => null,
            "finished" => null,
            "deleted" => null,
        ];

        return array_merge($template, $array);
    }
}