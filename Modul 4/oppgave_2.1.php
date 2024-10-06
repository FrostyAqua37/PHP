<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css"> <!-- Water CSS link -->   
    <title>Signup</title>
</head>
<body>
    <h1>Sign-up form</h1><br>
    <form action="oppgave_2.2.php" method="post">
        <div>
            <label for="firstName">First name</label>
            <input type="text" id="firstName" name="Lastname">
        </div><br>

        <div>
            <label for="lastName">Last name</label>
            <input type="text" id="Lastname" name="Lastname">
        </div><br>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div><br>

        <div>
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" name="phone"> 
        </div><br>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div><br>

        <div>
            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div><br>

        <button>Sign up</button><br><br>
    </form>

<?php

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (empty($_POST["firstName"])) {
        echo "First Name is required." . "<br>";
    } else {
        $firstName = trim($_POST["firstName"]);
    }

    if (empty($_POST["lastName"])) {
        echo "Last Name is required." . "<br>";
    } else {
        $lastName = trim($_POST["lastName"]);
    }

    if(empty($_POST["email"])) {
        //Check if email field is empty
        echo "Email is required." . "<br>";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //Check if email is valid.
        echo "Email is not valid" . "<br>";
    } else {
        $email = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
    }

    if (strlen($_POST["password"]) < 8) {
        echo "Password must be atleast 8 characters long." . "<br>";
    }

    if (!preg_match("/[A-Z]/i", $_POST["password"])) {
        //Checks if password has a capital letter.
       echo "Password must contain atleast one capital letter" . "<br>";
    }

    if($_POST["password"] !== $_POST["password_confirmation"]) {
        //Checks if passwords match.
        echo "Password must match";
    }
}
?>


</body>
</html>