<?php
session_start();

if (isset($_POST['submit'])) {
    $valid = true;
    
    if (empty($_POST["firstName"])) {
        //Checks if first name field is empty.
        $firstNameError = "First Name is required." . "<br>";
        $valid = false;
    } else {
        //Stores first name field.
        $_SESSION["firstName"] = trim($_POST["firstName"]);
    }

    if (empty($_POST["lastName"])) {
        //Checks if last name field is empty.
        $lastNameError = "Last Name is required." . "<br>";
        $valid = false;
    } else {
        //Stores last name field
        $_SESSION["lastName"] = trim($_POST["lastName"]);
    }

    if(empty($_POST["email"])) {
        //Check if email field is empty
        $emailRequired = "Email is required." . "<br>";
        $valid = false;
    } 
    
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //Check if email is valid.
        $emailValid = "Email is not valid" . "<br>";
        $valid = false;
    } else {
        //Stores email field into a session variabel
        $_SESSION["email"] = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
    }

    if (strlen($_POST["password"]) < 8) {
        //Checks if password is atleast 8 characters long.
        $passwordCharacters = "Password must be atleast 8 characters long." . "<br>";
        $valid = false;
    } 
    
    if (!preg_match("/[A-Z]/i", $_POST["password"])) {
        //Checks if password has a capital letter.
       $passwordCapital = "Password must contain atleast one capital letter" . "<br>";
       $valid = false;
    } 
    
    if($_POST["password"] === $_POST["password_confirmation"]) {
        //Checks if the passwords match eachother
        $_SESSION["password"] = trim($_POST["password"]);
    } else {
        //Checks if passwords match.
        $passwordMatch = "Password must match";
        $valid = false; 
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
    <style> /* Styling for empty/invalid form fields */
    .alert-warning {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid;
        border-radius: .25rem;
        width: fit-content;
    }
    </style>
</head>
<body>
    <h1>Sign-up form</h1><br>
    <form action="oppgave_2.1.php" method="post">
        <div>
            <label for="firstName">First name</label>
            <input type="text" id="firstName" name="firstName">
            <!--Outputs warning about empty first name field with styling -->
            <?php if(isset($firstNameError)) { echo "<div class='alert alert-warning' role='alert'>" . $firstNameError ."</div>"; } ?>
        </div>

        <div>
            <label for="lastName">Last name</label>
            <input type="text" id="lastName" name="lastName">
            <!--Outputs warning about empty last name field with styling. -->
            <?php if(isset($lastNameError)) { echo "<div class='alert alert-warning' role='alert'>" . $lastNameError  . "</div>"; } ?> 
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <!-- Warning about empty or invalid email -->
            <?php  
                if(isset($emailRequired))   { echo "<div class='alert alert-warning' role='alert'>" . $emailRequired . "</div>"; }
                else if(isset($emailValid))  { echo "<div class='alert alert-warning' role='alert'>" . $emailValid . "</div>"; }
            ?>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <!-- Warning about short password or password without capital letter -->
            <?php
                if(isset($passwordCharacters))   { echo "<div class='alert alert-warning' role='alert'>" . $passwordCharacters ."</div>"; }
                else if(isset($passwordCapital))  { echo "<div class='alert alert-warning' role='alert'>" . $passwordCapital ."</div>"; }  
            ?>
        </div>

        <div>
            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            <!-- Warning about password not matching -->
            <?php if(isset($passwordMatch)) { echo "<div class='alert alert-warning' role='alert'>" . $passwordMatch . "<br>"; }?>
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>