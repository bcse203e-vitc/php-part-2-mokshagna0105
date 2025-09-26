<?php
$inputFile = "students.txt";
$errorFile = "errors.log";
file_put_contents($errorFile, "");
if (!file_exists($inputFile)) {
    die("Error: File '$inputFile' not found!");
}
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$validRecords = [];
foreach ($lines as $line) {
    $fields = explode(",", $line);
    if (count($fields) != 3) {
        file_put_contents($errorFile, "Invalid format: $line" . PHP_EOL, FILE_APPEND);
        continue;
    }
    list($name, $email, $dob) = $fields;
    $name = trim($name);
    $email = trim($email);
    $dob = trim($dob);
    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
        file_put_contents($errorFile, "Invalid email: $line" . PHP_EOL, FILE_APPEND);
        continue;
    }
    try {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
    } catch (Exception $e) {
        file_put_contents($errorFile, "Invalid DOB: $line" . PHP_EOL, FILE_APPEND);
        continue;
    }
    $validRecords[] = [
        "name" => $name,
        "email" => $email,
        "age" => $age
    ];
}
if (!empty($validRecords)) {
    echo "<h2>Valid Student Records</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";

    foreach ($validRecords as $record) {
        echo "<tr>";
        echo "<td>{$record['name']}</td>";
        echo "<td>{$record['email']}</td>";
        echo "<td>{$record['age']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No valid records found.</p>";
}

echo "<p>Invalid records (if any) are saved in <b>$errorFile</b>.</p>";
?>
