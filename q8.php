<?php
$inputFile = "data.txt";
$outputFile = "numbers.txt";
if (!file_exists($inputFile)) {
    die("Error: Input file '$inputFile' not found!");
}
$content = file_get_contents($inputFile);
preg_match_all('/\b[6-9][0-9]{9}\b/', $content, $matches);
if (!empty($matches[0])) {
    file_put_contents($outputFile, implode(PHP_EOL, $matches[0]));
    echo "Extracted mobile numbers have been saved to '$outputFile'.<br><br>";
    echo "<h3>Extracted Mobile Numbers:</h3>";
    echo "<pre>" . implode("\n", $matches[0]) . "</pre>";
} else {
    echo "No valid mobile numbers found in the file.";
}
?>
