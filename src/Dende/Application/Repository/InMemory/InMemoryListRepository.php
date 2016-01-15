<?php
namespace Dende\Application\Repository\InMemory;

use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Domain\TodoList;

/**
 * Class InMemoryListRepository.
 */
class InMemoryListRepository implements ListRepositoryInterface
{
    use FilterTrait;

    /**
     * @var array|TodoList[]
     */
    private $lists = [];

    /**
     * {@inheritdoc}
     */
    public function insert(TodoList $todoList)
    {
        $this->lists[$todoList->id()] = $todoList;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(TodoList $todoList)
    {
        // TODO: Implement remove() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update(TodoList $todoList)
    {
        // TODO: Implement update() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(array $parameters = [])
    {
        return $this->filter($this->lists, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function findOne(array $parameters = [])
    {
        $result = $this->findAll($parameters);

        return array_pop($result);
    }
}
