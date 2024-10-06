<title>Oppgave 3: Valider E-post</title>
<strong>Oppgave 3: Valider E-post</strong><br>
<?php 
$email_1 = "123@gmail.com";
$email_2 = "test";

if (filter_var($email_1, FILTER_VALIDATE_EMAIL)) {
    echo "Email Address: '$email_1' is a valid email. <br>";
} else {
    echo "Email Address: '$email_1' is not a valid email. <br>";
}

if (filter_var($email_2, FILTER_VALIDATE_EMAIL)) {
    echo "Email Address: '$email_2' is a valid email. <br>";
} else {
    echo "Email Address: '$email_2' is not a valid email. <br>";
}

?>