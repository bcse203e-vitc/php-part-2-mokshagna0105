<?php
$logFile = "access.log";
$username = "admin";
$action = "Logged In";
$timestamp = date("Y-m-d H:i:s");
$logEntry = "$username – $timestamp – $action" . PHP_EOL;
file_put_contents($logFile, $logEntry, FILE_APPEND);
$lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$lastLogs = array_slice($lines, -5);
echo "<h3>Last 5 Log Entries:</h3>";
echo "<pre>";
foreach ($lastLogs as $log) {
    echo $log . "\n";
}
echo "</pre>";
?>
