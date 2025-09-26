<?php
$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun" => 78,
    "Sneha" => 95,
    "Vikram" => 88,
    "Anjali" => 85,
    "Ravi" => 75
];

arsort($students);
echo "<h2>Top 3 Students</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead><tr><th>Rank</th><th>Name</th><th>Marks</th></tr></thead>";
echo "<tbody>";

$rank = 1;
foreach ($students as $name => $marks) {
    if ($rank > 3) {
        break;
    }
    echo "<tr><td>$rank</td><td>$name</td><td>$marks</td></tr>";
    $rank++;
}

echo "</tbody>";
echo "</table>";

?>
