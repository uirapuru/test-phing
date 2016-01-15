<?php
namespace Dende\Bundle\AppBundle\DataFixtures\ORM;

use Dende\Domain\Task;
use VM\CommonBundle\DataFixtures\BaseFixture;

/**
 * Class CalendarsData.
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
     *
     * @return Task
     */
    public function insert($params)
    {
        return $this->container->get('dende_todo.factory.todo_list')->createFromArray([
            'id'    => $params['id'],
            'title' => $params['title'],
        ]);
    }
}
