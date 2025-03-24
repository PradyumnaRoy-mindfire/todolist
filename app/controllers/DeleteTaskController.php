<?php 
namespace App\Controllers;
use App\Core\BaseController;
use App\Core\Logger;
use Exception;

class DeleteTaskController extends BaseController {

    public function deleteTask()  {
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'delete') {
                if(!isset($_POST['id'])) {
                    throw new Exception("Task id not found");
                    exit;
                }
                $taskId = $_POST['id']; 
                $this->taskModel->deleteTask(['id' => $taskId]);
                echo json_encode(['status' => 'Delete' , 'message' => 'Task deleted successfully']);
            } 
            else {
                throw new Exception("Invalid request method or action");
            }
        }
        catch(Exception $e) {
            Logger::logError("Error: In DeleteTask Controller ",$e->getMessage());
        }
    }
}