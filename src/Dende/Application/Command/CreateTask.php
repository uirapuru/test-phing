<?php
namespace Dende\Application\Command;

use DateTime;

/**
 * Class CreateTask.
 */
class CreateTask
{
    /** @var string */
    public $title;

    /** @var int */
    public $listId;

    /** @var string */
    public $content;

    /** @var DateTime|null */
    public $finished;
}
