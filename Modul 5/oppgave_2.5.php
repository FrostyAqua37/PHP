<?php
    if(isset($_POST["submit"])) {
        $valid = true;
        $_POST["firstName"] = trim($_POST["firstName"]);
        $_POST["lastName"] = trim($_POST["lastName"]);
        $_POST["email"] = trim($_POST["email"]);
        $_POST["password"] = trim($_POST["password"]);
        $_POST["password_confirmation"] = trim($_POST["password_confirmation"]);
   

        if(empty($_POST["firstName"])) {
            //Checks if first name field is empty.
            $firstNameError = "First name is required" . "<br>";
            $valid = false;
        } else if (!ctype_alpha($_POST["firstName"])) {
            //Checks if first name field contains any numbers or special characters
            $onlyLettersFirstName = "First name cant contain numbers or special characters." . "<br>";
            $valid = false;
        } else {
            //Stores first name field.
            $firstName = $_POST["firstName"];
        }

        if(empty($_POST["lastName"])) {
            //Checks if last name field is empty.
            $lastNameError = "Last name is required" . "<br>";
            $valid = false;
        } else if(!ctype_alpha($_POST["lastName"])) {
            //Checks if the last name contains any numbers or special characters.
            $onlyLettersLastName = "Last name cant contain numbers or special characters." . "<br>";
            $valid = false;
        } else {
            //Stores last name field
            $lastName = $_POST["lastName"];
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
            //Sanitizes the email and stores it.
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        }

        if(strlen($_POST["password"]) < 8) {
            //Checks if password is atleast 8 characters long.
            $passwordCharacters = "Password must be atleast 8 characters long." . "<br>";
            $valid = false;
        } else if (!preg_match("/[A-Z]/", $_POST["password"])) {
            //Checks if password has a capital letter.
            $passwordCapital = "Password must contain atleast one capital letter" . "<br>";
            $valid = false;
        } else if ($_POST["password"] === $_POST["password_confirmation"]) {
            $password = $_POST["password"];
        } else {
            //Checks if the password match
            $passwordMatch = "Password must match";
            $valid = false;
        }

        //Code that stores the information in the database when form validation is passed
        if($valid) {
            //Hashing the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            //require file where database information is located to save space
            $mysqli = require __DIR__ . "/database.php";

            //SQL query to store the information
            $sql = "INSERT INTO guest (first_name, last_name, email, password_hash)
                    VALUES (?, ?, ?, ?)";

            $stmt = $mysqli->stmt_init();

            if (!$stmt->prepare($sql)) {
                //Prints out error if there are any
                die("SQL error: " . $mysqli->error);
            }

            $stmt->bind_param("ssss", $firstName, $lastName, $email, $password_hash);

            if ($stmt->execute()) {
                header("Location: sign up_successful.php");
                exit();
            } else {
                die($mysqli->error . " " . $mysqli->errno);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">    
    <title>Sign up</title>
    <style>
    /* Login alert button styling */
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
    <h1>Guest registration</h1><br>
    <!-- Sign up form -->
    <form action="sign up.php" method="post">
        <div>
            <label for="firstName">First name</label>
            <input type="text" id="firstName" name="firstName">
            <?php 
                if(isset($firstNameError)) { echo "<div class='alert alert-warning' role='alert'>" . $firstNameError ."</div>"; } 
                else if (isset($onlyLettersFirstName)) { echo "<div class='alert alert-warning' role='alert'>" . $onlyLettersFirstName ."</div>";}
            ?>
        </div>

        <div>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName">
            <?php 
                if(isset($lastNameError)) { echo "<div class='alert alert-warning' role='alert'>" . $lastNameError  . "</div>"; } 
                else if (isset($onlyLettersLastName)) { echo "<div class='alert alert-warning' role='alert'>" . $onlyLettersLastName ."</div>";}
                ?> 
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <?php  
                if(isset($emailRequired))   { echo "<div class='alert alert-warning' role='alert'>" . $emailRequired . "</div>"; }
                else if(isset($emailValid))  { echo "<div class='alert alert-warning' role='alert'>" . $emailValid . "</div>"; }
            ?>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?php
                if(isset($passwordCharacters))   { echo "<div class='alert alert-warning' role='alert'>" . $passwordCharacters ."</div>"; }
                else if(isset($passwordCapital))  { echo "<div class='alert alert-warning' role='alert'>" . $passwordCapital ."</div>"; }  
            ?>
        </div>

        <div>
            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            <?php if(isset($passwordMatch)) { echo "<div class='alert alert-warning' role='alert'>" . $passwordMatch . "<br>"; }?>
        </div>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

