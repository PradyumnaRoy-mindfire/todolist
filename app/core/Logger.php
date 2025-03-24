<?php
namespace app\core;

class Logger {
    public static function logError($message) {
        $logFile = __DIR__ .'/../../storage/logs/app.log';
        error_log("[" . date('Y-m-d H:i:s') . "] " . $message . "\n", 3, $logFile);
    }
}
