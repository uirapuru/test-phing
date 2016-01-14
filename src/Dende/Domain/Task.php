<?php
namespace Dende\Domain;

/**
 * Class Task
 * @package Dende\Domain
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
     * @param string $id
     * @param string $title
     * @param string $content
     * @param TodoList $list
     * @param \DateTime $finished
     * @param \DateTime $deleted
     */
    public function __construct($id = null, $title = "", $content = "", TodoList $list, \DateTime $finished = null, \DateTime $deleted = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->list = $list;
        $this->finished = $finished;
        $this->deleted = $deleted;
    }


}