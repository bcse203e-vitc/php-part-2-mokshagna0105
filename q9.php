<?php
$originalFile = "notes.txt";
if (!file_exists($originalFile)) {
    die("Error: File '$originalFile' not found!");
}
$pathInfo = pathinfo($originalFile);
$filename = $pathInfo['filename'];
$extension = isset($pathInfo['extension']) ? "." . $pathInfo['extension'] : "";
$timestamp = date("Y-m-d_H-i");  // Format: YYYY-MM-DD_HH-MM
$backupFile = $filename . "_" . $timestamp . $extension;
if (copy($originalFile, $backupFile)) {
    echo "Backup created successfully: $backupFile";
} else {
    echo "Error: Failed to create backup.";
}
?>
