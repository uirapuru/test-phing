<?php
namespace Dende\Bundle\AppBundle\DataFixtures\ORM;

use Dende\Domain\Task;
use VM\CommonBundle\DataFixtures\BaseFixture;

/**
 * Class CalendarsData
 * @package Dende\CalendarBundle\Tests\DataFixtures\Standard\ORM
 */
final class TasksData extends BaseFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * @param $params
     * @return Task
     */
    public function insert($params)
    {
        return $this->container->get("dende_todo.factory.task")->createFromArray([
            "id" => $params["id"],
            "title" => $params["name"],
            "content" => $params["content"],
            "list" => $this->getReference($params["list"]),
            "finished" => $params["finished"],
            "deleted" => $params["deleted"],
        ]);
    }
}
