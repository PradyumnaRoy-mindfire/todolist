<?php 
namespace App\Core;
use App\Models\Task;
use Exception;

class BaseController {
    public $taskModel;
    
    public function __construct() {
        $this->taskModel = new Task();
    }

    public function view($viewFile, $data = []) {
        try {
            switch($viewFile) {
                case 'tasks':
                    $tasks = $data;
                    $file = __DIR__ . "/../../views/tasks.php";

                    if(!file_exists($file)) {
                        throw new Exception("$file file not found");
                        exit;
                    }

                    require_once $file;
                    break;
                case 'addNewTask':
                    extract($data); // extract functions break the array in variable
                    $file = __DIR__ . "/../../views/addNewTask.php";

                    if(!file_exists($file)) {
                        throw new Exception("$file file not found");
                        exit;
                    }

                    require_once $file;
                    break;
            } 
        }
        catch(Exception $e) {
            Logger::logError("Error : In BaseController",$e->getMessage());
        }
          
    }
}