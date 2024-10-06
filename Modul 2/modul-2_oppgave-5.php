<title>Oppgave 5: Passordgenerator</title>
<strong>Oppgave 5: Passordgenerator</strong><br>
<meta charset="UTF-8">
<?php

$character = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

$random = str_shuffle($character);
//echo "<strong>Random order of letters and numbers: </strong>" . $random . "<br>";
$random_password = substr($random, 0, 8);

while (!preg_match('/[A-Za-z]/', $random_password) && !preg_match('/[0-9]/', $random_password)) {
    $random = str_shuffle($character);
    $random_password = substr($random, 0, 8);
}
echo "<strong> Random password on 8 characters with number and capital letter: </strong>" . $random_password . "<br>";
?>
