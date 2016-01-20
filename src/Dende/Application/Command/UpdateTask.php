<?php
namespace Dende\Application\Command;

use DateTime;
use Dende\Domain\Task;

/**
 * Class CreateTask.
 */
class UpdateTask extends CreateTask
{
    /** @var string */
    public $id;

    /** @var DateTime */
    public $deleted;

    /**
     * @param Task $task
     */
    public function populateWithTask(Task $task)
    {
        $this->id = $task->id();
        $this->deleted = $task->deleted();
        $this->finished = $task->finished();
        $this->title = $task->title();
        $this->content = $task->content();
    }
}
