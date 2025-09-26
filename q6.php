<?php
echo "<h3>Current Date & Time:</h3>";
echo date("d-m-Y H:i:s") . "<br><br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"]; // Format: YYYY-MM-DD
    if (!empty($dob)) {
        $today = new DateTime();
        $dobDate = new DateTime($dob);
        $nextBirthday = new DateTime($today->format("Y") . "-" . $dobDate->format("m-d"));
        if ($nextBirthday < $today) {
            $nextBirthday->modify("+1 year");
        }
        $interval = $today->diff($nextBirthday);
        $daysLeft = $interval->days;
        echo "<h3>Your DOB: " . $dob . "</h3>";
        echo "Days left until your next birthday: <b>$daysLeft days</b>";
    } else {
        echo "Please enter a valid date of birth.";
    }
}
?>
<!-- HTML Form -->
<form method="post">
    <label for="dob">Enter your Date of Birth (YYYY-MM-DD):</label><br>
    <input type="date" name="dob" required>
    <br><br>
    <input type="submit" value="Calculate">
</form>
