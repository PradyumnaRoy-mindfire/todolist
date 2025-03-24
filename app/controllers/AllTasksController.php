<?php 
namespace app\controllers;
use app\core\BaseController;

class AllTasksController extends BaseController{

    public function showAlltasks() {
        $tasks = $this->taskModel->getAllTasks();
        return $this->view('tasks',$tasks);
    }
    
}