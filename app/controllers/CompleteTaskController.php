<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Core\Logger;
use Exception;

class CompleteTaskController extends BaseController {
    
    public function completeTask(){
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'complete') {
                if(!isset($_POST['id'])) {
                    throw new Exception("Task id not found");
                    exit;
                }
                $taskId = $_POST['id']; 
                $this->taskModel->completeTask(['id' => $taskId]) ;
                echo json_encode(['status' => 'Comleted' , 'message' => 'Task status changed to completed successfully']);
            }
            else {
                throw new Exception("Invalid request method or action");
            }
        }
        catch(Exception $e) {
            Logger::logError("Error: In CompleteTask Controller ",$e->getMessage());
        }
    }
}