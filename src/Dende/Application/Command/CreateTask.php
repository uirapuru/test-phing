<?php
namespace Dende\Application\Command;

use DateTime;

/**
 * Class CreateTask
 * @package Dende\Application\Command
 */
class CreateTask
{
    /** @var string */
    public $title;

    /** @var integer */
    public $listId;

    /** @var string */
    public $content;

    /** @var DateTime|null */
    public $finished;
}