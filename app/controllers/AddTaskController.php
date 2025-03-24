<?php 
namespace app\controllers;
use app\core\BaseController;
use app\core\Logger;
use Exception;

class AddTaskController extends BaseController  {
    
    public function addTask(){
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
                $taskTitle = trim($_POST['task']);

                if (empty($taskTitle)) {
                    throw new Exception("Task title cannot be empty.");
                }

                $taskId = $this->taskModel->storeTask(["title" => $taskTitle]);
                return $this->view('addNewTask',['taskId'=>$taskId,'taskTitle' => $taskTitle]);
            }
            else {
                throw new Exception("Invalid request method or task not found.");
            }
        }
        catch(Exception $e) {
            Logger::logError("Exception in AddTaskController , ",$e->getMessage());
        }
        
    }
}