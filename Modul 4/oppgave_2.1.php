<?php
if (isset($_POST['submit'])) {
    $valid = true;

    if (empty($_POST["firstName"])) {
        //Checks if first name field is empty.
        $firstNameError = "First Name is required." . "<br>";
        $valid = false;
    } else {
        $_SESSION["firstName"] = trim($_POST["firstName"]);
    }

    if (empty($_POST["lastName"])) {
        //Checks if last name field is empty.
        $lastNameError = "Last Name is required." . "<br>";
        $valid = false;
    } else {
        $_SESSION["lastName"] = trim($_POST["lastName"]);
    }

    if(empty($_POST["email"])) {
        //Check if email field is empty
        $emailRequired = "Email is required." . "<br>";
        $valid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //Check if email is valid.
        $emailValid = "Email is not valid" . "<br>";
        $valid = false;
    } else {
        $_SESSION["email"] = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
    }

    if (strlen($_POST["password"]) < 8) {
        //Checks if password is atleast 8 characters long.
        $passwordCharacters = "Password must be atleast 8 characters long." . "<br>";
        $valid = false;
    } else if (!preg_match("/[A-Z]/i", $_POST["password"])) {
        //Checks if password has a capital letter.
       $passwordCapital = "Password must contain atleast one capital letter" . "<br>";
       $valid = false;
    } else if($_POST["password"] !== $_POST["password_confirmation"]) {
        //Checks if passwords match.
        $passwordMatch = "Password must match";
        $valid = false; 
    } else {
        $_SESSION["password"] = trim($_POST["password"]);
    }

    if($valid) {
        //Redirects if all fields are valid and filled out.
        header("Location: oppgave_2.2.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css" /> <!-- Water CSS link -->   
    <title>Signup</title>
</head>
<body>
    <h1>Sign-up form</h1><br>
    <form action="oppgave_2.1.php" method="post">
        <div>
            <label for="firstName">First name</label>
            <input type="text" id="firstName" name="firstName"><br>
            <?php if(isset($firstNameError)) { echo $firstNameError; } ?>
        </div><br>

        <div>
            <label for="lastName">Last name</label>
            <input type="text" id="lastName" name="lastName"><br>
            <?php if(isset($lastNameError)) { echo $lastNameError; } ?>
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
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>