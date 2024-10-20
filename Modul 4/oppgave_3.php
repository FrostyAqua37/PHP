<?php
$accountInformation = [
    "name" => "Eivind Chen", 
    "email" => "1234@gmail.com",
    "password" => "1234567890A"];

//Same code for form validation as in oppgave_2.2.php 
if (isset($_POST['submit'])) {
    $valid = true;
    if (empty($_POST["name"])) {
        //Checks if first name field is empty.
        $nameError = "Name is required." . "<br>";
        $valid = false;
    } else if ($accountInformation["name"] === $_POST["name"]){
        $sameName= "New name cant be identical to previous name";
        $valid = false;
    } else {
        //Stores first name field.
        $accountInformation["name"] = trim($_POST["name"]);
    }

    if(empty($_POST["email"])) {
        //Check if email field is empty
        $emailRequired = "Email is required." . "<br>";
        $valid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //Check if email is valid.
        $emailValid = "Email is not valid" . "<br>";
        $valid = false;
    } else if ($accountInformation["email"] === $_POST["email"]){
        $sameEmail = "New email cant be identical to previous email";
        $valid = false;
    } else {
        //Stores email field into a session variabel
        $accountInformation["email"] = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
    }

    if (strlen($_POST["password"]) < 8) {
        //Checks if password is atleast 8 characters long.
        $passwordCharacters = "Password must be atleast 8 characters long." . "<br>";
        $valid = false;
    } else if (!preg_match("/[A-Z]/i", $_POST["password"])) {
        //Checks if password has a capital letter.
       $passwordCapital = "Password must contain atleast one capital letter" . "<br>";
       $valid = false;
    } else if ($_POST["password"] !== $_POST["password_confirmation"]){
        //Checks if passwords match.
        $passwordMatch = "Password must match";
        $valid = false;
    } else if($accountInformation["password"] === $_POST["password"]){
        $samePassword = "New password cant be identical to previous password";
        $valid = false;
    } else if($_POST["password"] === $_POST["password_confirmation"]) {
        //Checks if the passwords match eachother
        $accountInformation["password"] = trim($_POST["password"]);     
    } 
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css" /> <!-- Water CSS link -->   
<?php
    //Hides the form after submitting it
    if($valid) {
        echo $accountInformation["name"] . "<br>";
        echo $accountInformation["email"] . "<br>";
        echo $accountInformation["password"] . "<br>";
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css" /> <!-- Water CSS link -->   
    <title>Edit</title>
    <style>
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
    <!-- Same validation form and PHP code warning messages as in oppgave_2.1.php -->
    <h1>Edit Account Information</h1>   
    <form action="oppgave_3.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $accountInformation["name"]; ?>">
            <?php 
                if(isset($nameError)) { echo "<div class='alert alert-warning' role='alert'>" . $nameError ."</div>"; } 
                else if (isset($sameName)) { echo "<div class='alert alert-warning' role='alert'>" . $sameName."</div>"; } 
            ?>
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $accountInformation["email"]; ?>">
            <?php  
                if(isset($emailRequired))   { echo "<div class='alert alert-warning' role='alert'>" . $emailRequired . "</div>"; }
                else if(isset($emailValid))  { echo "<div class='alert alert-warning' role='alert'>" . $emailValid . "</div>"; }
                else if (isset($sameEmail)) { echo "<div class='alert alert-warning' role='alert'>" . $sameEmail."</div>"; } 
            ?>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php echo $accountInformation["password"]; ?>">
            <?php
                if(isset($passwordCharacters))   { echo "<div class='alert alert-warning' role='alert'>" . $passwordCharacters ."</div>"; }
                else if(isset($passwordCapital))  { echo "<div class='alert alert-warning' role='alert'>" . $passwordCapital ."</div>"; }  
                else if (isset($samePassword)) { echo "<div class='alert alert-warning' role='alert'>" . $samePassword."</div>"; } 
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
<?php
}
?>
