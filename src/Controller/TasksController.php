<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Prefix("/api")
 */
class TasksController extends Controller
{
    /**
     * @Rest\View
     */
    public function getTaskAction($id)
    {
        /** @var EntityManager $em */
        $em = $this->get('doctrine')->getManager();
        $task = $em->find(Task::class, $id);
        if (!$task) {
//            $this->createNotFoundException();
            return new Response('not found', 404);
        }

        return $this->json($task);
    }

    public function getTasksAction()
    {
        // return $this->render('tasks/getTasks.html.twig', [
        //     'controller_name' => 'TasksController',
        // ]);
    } // "get_tasks"            [GET] /tasks

    public function postTaskAction()
    {} // "post_task"           [POST] /tasks

    public function putTaskAction($slug)
    {} // "put_task"             [PUT] /tasks/{slug}

    public function deleteTaskAction($slug)
    {} // "delete_task"          [DELETE] /tasks/{slug}

    public function newTaskAction(Request $request)
    {
        return $this->processForm($request, new Task());
    }

    private function processForm(Request $request, Task $task)
    {
        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            // TODO: save task
            return $this->redirectToRoute('task_success');
        }

        return $this->render('tasks/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
