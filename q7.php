<?php
class EmptyArrayException extends Exception {}
function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}
$arrays = [
    [10, 20, 30, 40, 50],
    []
];
foreach ($arrays as $arr) {
    try {
        $avg = calculateAverage($arr);
        echo "Numbers: " . implode(", ", $arr) . "<br>";
        echo "Average: $avg <br><br>";
    } catch (EmptyArrayException $e) {
        echo "Error: " . $e->getMessage() . "<br><br>";
    }
}
?>
