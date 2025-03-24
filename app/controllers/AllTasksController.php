<?php 
namespace App\Controllers;
use App\Core\BaseController;

class AllTasksController extends BaseController{

    public function showAlltasks() {
        $tasks = $this->taskModel->getAllTasks();
        return $this->view('tasks',$tasks);
    }
    
}