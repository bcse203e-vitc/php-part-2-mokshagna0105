<?php
class InvalidPasswordException extends Exception {}
function validatePassword($password){
    if (strlen($password) < 8) {
        throw new InvalidPasswordException("Password must be at least 8 characters long.");
    }
    if (!preg_match('/[A-Z]/', $password)) {
        throw new InvalidPasswordException("Password must contain at least one uppercase letter.");
    }
    if (!preg_match('/\d/', $password)) {
        throw new InvalidPasswordException("Password must contain at least one digit.");
    }
    if (!preg_match('/[@$#%]/', $password)) {
        throw new InvalidPasswordException("Password must contain at least one special character (e.g., @, #, $, %).");
    }
    return true;
}
$passwords = ["ValidP@ss1","short","nouppercase1@","NoDigits!@#","NoSpecialChar123"];
foreach($passwords as $password){
echo "checking $password <br>";
try {
    if (validatePassword($password)) {
        echo "Password is valid.<br>";
    }
} catch (InvalidPasswordException $e) {
    echo "Error:".$e->getMessage()."<br>";
}
}

?>