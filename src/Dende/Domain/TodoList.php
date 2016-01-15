<?php
namespace Dende\Domain;

use Dende\Application\Repository\InMemory\FilterTrait;

/**
 * Class TodoList.
 */
class TodoList
{
    use FilterTrait;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $tasks = [];

    /**
     * @var \DateTime
     */
    private $deleted;

    /**
     * TodoList constructor.
     *
     * @param string $id
     * @param string $title
     * @param array  $tasks
     */
    public function __construct($id, $title, array $tasks = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->tasks = $tasks;
    }

    public function addTask(Task $task)
    {
        $this->tasks[$task->id()] = $task;
    }

    public function removeTask(Task $task)
    {
    }

    public function findTask($id)
    {
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function tasks()
    {
        return $this->tasks;
    }

    /**
     * @return \DateTime
     */
    public function deleted()
    {
        return $this->deleted;
    }

    /**
     * @return array|Task
     */
    public function findNotFinishedTasks()
    {
        return $this->filter($this->tasks(), ['finished' => null]);
    }
}
