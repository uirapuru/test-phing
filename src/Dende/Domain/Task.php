<?php
namespace Dende\Domain;

use Dende\Application\Command\UpdateTask;

/**
 * Class Task.
 */
class Task
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var TodoList
     */
    private $list;

    /**
     * @var \DateTime
     */
    private $finished;

    /**
     * @var \DateTime
     */
    private $deleted;

    /**
     * Task constructor.
     *
     * @param string    $id
     * @param string    $title
     * @param string    $content
     * @param TodoList  $list
     * @param \DateTime $finished
     * @param \DateTime $deleted
     */
    public function __construct($id = null, $title = '', $content = '', TodoList $list = null, \DateTime $finished = null, \DateTime $deleted = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->list = $list;
        $this->finished = $finished;
        $this->deleted = $deleted;
    }

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
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function finished()
    {
        return $this->finished;
    }

    /**
     * @return \DateTime
     */
    public function deleted()
    {
        return $this->deleted;
    }

    /**
     * @return TodoList
     */
    public function todoList()
    {
        return $this->list;
    }

    /**
     * @param UpdateTask $command
     */
    public function updateWithCommand(UpdateTask $command)
    {
        $this->title = $command->title;
        $this->content = $command->content;
        $this->finished = $command->finished;
        $this->deleted = $command->deleted;
    }

    /**
     * @return bool
     */
    public function isFinished()
    {
        return !is_null($this->finished);
    }
}
