<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TasksController extends Controller
{

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
}
