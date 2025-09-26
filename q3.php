<?php
$emails = [
    'john@example.com',
    'wrong-email@',
    'm@site.com',
    'user 123@gmail.com',
    'another.user@domain.co.uk',
    '@nodomain.com',
    'test@localhost',
    'invalid..email@test.com'
];
$regex_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/';
echo "Valid email addresses:<br>";
foreach ($emails as $email) {
    if (preg_match($regex_pattern, $email)) {
        echo "$email<br>";
    }
}
?>
