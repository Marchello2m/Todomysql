<?php

namespace App\Controllers;

use App\Models\Task;
use App\Repositories\CsvTasksRepository;
use App\Repositories\MysqlTasksRepository;
use App\Repositories\TasksRepository;
use App\View;
use Ramsey\Uuid\Uuid;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class TasksController
{

    private Environment  $twig;
    private TasksRepository $tasksRepository;
    public function __construct()
    {
       $this->tasksRepository = new MysqlTasksRepository();



    }


    public function index():View
    {
        $tasks = $this->tasksRepository->getAll();

        return new View('tasks/index.twig',[
            'tasks'=> $tasks
        ]);



    }
    public function create()
    {
        require_once 'app/Views/tasks/create.twig';
    }

    public function store()
    {



       $task =new Task(
           Uuid::uuid4(),
           $_POST['title'],

       );

        $this->tasksRepository->save($task);

        header('Location:/tasks');
    }
    public function delete(array $vars)
    {
      $id =$vars['id'] ?? null;
       if ($id == null) header('Location:/tasks');

               $task = $this->tasksRepository->getOne($id);

            if ($task !==null)
              {
                 $this->tasksRepository->delete($task);
             }
        header('Location:/tasks');

    }

}
