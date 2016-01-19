<?php
namespace Dende\Bundle\AppBundle\Controller;

use Dende\Application\Command\CreateTask;
use Dende\Application\Command\UpdateTask;
use Dende\Domain\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppController.
 */
class AppController extends Controller
{
    /**
     * @param Request $request
     * @Route("/",  name="dende_todo_index")
     * @Template()
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $todoList = $this->get("dende_todo.repository.todo_list")->findOne();

        $command = new CreateTask();
        $command->listId = $todoList->id();

        $form = $this->createForm('short_task', $command, [
            "action" => $this->generateUrl("dende_todo_index"),
            "method" => "POST"
        ]);

        if($request->isMethod("POST")) {
            $form->handleRequest($request);

            if($form->isValid())
            {
//                $this->get("tactician")->handle($form->getData());
                $this->get("dende_todo.handler.create_task")->handle($form->getData());
                $this->addFlash("success", "todo.task_add.success");
                return $this->redirectToRoute("dende_todo_index");
            } else {
                $this->addFlash("warning", "todo.task_add.error");
            }
        }

        return [
            "todoList" => $todoList,
            "form" => $form->createView()
        ];
    }

    /**
     * @param Request $request
     * @Route("/{id}",  name="dende_todo_update")
     * @ParamConverter("id", class="App:Task")
     * @Template()
     *
     * @return array
     */
    public function updateAction(Request $request, Task $task)
    {
        $command = new UpdateTask();
        $command->populateWithTask($task);

        $form = $this->createForm('task', $command, [
            "action" => $this->generateUrl("dende_todo_update", ["id" => $task->id()]),
            "method" => "POST",
        ]);

        if($request->isMethod("POST")) {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $this->get("dende_todo.handler.update_task")->handle($form->getData());
                $this->addFlash("success", "todo.task_update.success");
                return $this->redirectToRoute("dende_todo_update", ["id" => $task->id()]);
            } else {
                $this->addFlash("warning", "todo.task_add.error");
            }
        }

        return [
            "form" => $form->createView(),
            "task" => $task
        ];
    }

    /**
     * @param Request $request
     * @Route("/{id}/finish",  name="dende_todo_finish")
     * @ParamConverter("id", class="App:Task")
     * @Template()
     *
     * @return array
     */
    public function finishAction(Request $request, Task $task)
    {
        $command = new UpdateTask();
        $command->populateWithTask($task);
        $command->finished = new \DateTime("now");

        $this->get("dende_todo.handler.update_task")->handle($command);

        $this->addFlash("success", "todo.task_finish.success");
        return $this->redirectToRoute("dende_todo_index");
    }

    /**
     * @param Request $request
     * @Route("/{id}/remove",  name="dende_todo_remove")
     * @ParamConverter("id", class="App:Task")
     * @Template()
     *
     * @return array
     */
    public function removeAction(Request $request, Task $task)
    {
        $command = new UpdateTask();
        $command->populateWithTask($task);
        $command->deleted = new \DateTime("now");

        $this->get("dende_todo.handler.update_task")->handle($command);

        $this->addFlash("warning", "todo.task_remove.success");
        return $this->redirectToRoute("dende_todo_index");
    }
}
