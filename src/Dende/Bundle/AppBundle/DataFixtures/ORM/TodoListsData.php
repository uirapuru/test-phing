<?php
namespace Dende\Bundle\AppBundle\DataFixtures\ORM;

use Dende\Domain\Task;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use VM\CommonBundle\DataFixtures\BaseFixture;

/**
 * Class CalendarsData
 * @package Dende\CalendarBundle\Tests\DataFixtures\Standard\ORM
 */
final class TodoListsData extends BaseFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @param $params
     * @return Task
     */
    public function insert($params)
    {
        return $this->container->get("dende_todo.factory.todo_list")->createFromArray([
            "id" => $params["id"],
            "title" => $params["title"]
        ]);
    }
}
