<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Core\Logger;
use Exception;

class EditTaskController extends BaseController {
    
    public function editTask() {
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
                if(!isset($_POST['id']) || empty($_POST['task'])) {
                    throw new Exception("Task title or Task id is not found");
                    exit;
                }
                $taskTitle = trim($_POST['task']);
                $taskId = $_POST['id'] ; 
                $this->taskModel->editTask(['title' => $taskTitle ,'id' => $taskId]);
                echo json_encode(['status' => 'Update' , 'message' => 'Task updated successfully']);
            }
            else {
                throw new Exception("Invalid request method or action");
            }

        }
        catch(Exception $e) {
            Logger::logError("Error: In EditTask Controller ",$e->getMessage());
        }
    }
}