<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css"> <!-- Water CSS link -->   
    <title>Home Page</title>
</head>
<body>
    <h1>The signup was successful.</h1>
    <hr>
    <?php  
    //Array for storing information
    $signup = array(
        "firstName" => $_SESSION["firstName"], 
        "lastName"  => $_SESSION["lastName"],
        "email" => $_SESSION["email"], 
        "password" => $_SESSION["password"]);

    //Outputs firstname, lastname, email and password. 
    echo "<strong>Sign-up Information</strong><br>";
    echo "<hr>";
    echo "<strong>First name: </strong>" . $signup["firstName"] . "<br>";
    echo "<strong>Last name: </strong>" . $signup["lastName"] . "<br>";
    echo "<strong>Email: </strong>" . $signup["email"] . "<br>";   
    echo "<strong>Password: </strong>" . $signup["password"] . "<br>"; 
    ?>
</body>
</html>

