<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use app\core\Logger;

// Loading environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Database configuration
$dbhost = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $_ENV['DB_USER'] , $_ENV['DB_PASSWORD']);
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

} catch (PDOException $e) {
    Logger::logError("Exception in index page ",$e->getMessage());
    die();
}       