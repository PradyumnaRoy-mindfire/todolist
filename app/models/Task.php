<?php 
namespace app\models;

use app\core\Logger;
use PDO; //as thjis is global namespace
use PDOException;

class Task {
    private $conn;
    private $tableName = 'tasks';

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
        //fetch all tasks
    public function getAllTasks() {
        try{
            $sql = "SELECT * FROM $this->tableName";
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e ) {
            Logger::logError("Exception during getting all tasks ",$e->getMessage());
        }
    }
        //add a new tasks
    public function storeTask($dataArray) {
        try{
            $sql = "INSERT INTO $this->tableName (title) VALUES (:title)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($dataArray);
            return $this->conn->lastInsertId();
        } catch(PDOException $e ) {
            Logger::logError("Exception during storing a task ",$e->getMessage());
        }

    }
        //edit a task
    public function editTask($dataArray) {
        try{
            $sql = "UPDATE $this->tableName SET title = :title WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($dataArray);
        } catch(PDOException $e ) {
            Logger::logError("Exception during editing a task ",$e->getMessage());
        }
        
    }
        //complete a task
    public function completeTask($dataArray) {
        try{
            $sql = "UPDATE $this->tableName SET status = 'completed' WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($dataArray);
        } catch(PDOException $e ) {
            Logger::logError("Exception during changing status to complete ",$e->getMessage());
        }
    }
    
    // Delete a task
    public function deleteTask($dataArray) {
        try{
            $sql = "DELETE FROM $this->tableName WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($dataArray);
        } catch(PDOException $e ) {
            Logger::logError("Exception during deleting a task ",$e->getMessage());
        }
    }
}