<?php 
namespace app\core;
use app\models\Task;

class BaseController {
    public $taskModel;
    
    public function __construct($conn) {
        $this->taskModel = new Task($conn);
    }

    public function view($viewFile, $data = []) {
        switch($viewFile) {
            case 'tasks':
                $tasks = $data;
                require_once __DIR__ . "/../../views/tasks.php";
                break;
            case 'addNewTask':
                extract($data); // extract functions break the array in variable
                require_once __DIR__ . "/../../views/addNewTask.php";
        }   
    }
}