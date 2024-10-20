<?php
    $invalid = false;
    
    //Connects to database and fetches guest login information
    if($_SERVER["REQUEST_METHOD"] === "POST") {

        $connection = require __DIR__ . "/database.php";

        //SQL query to obtain information about guest based on email
        $sql = sprintf("SELECT * FROM guest 
                          WHERE email = '%s'",
                          $connection->real_escape_string($_POST["email"]));

        $query = $mysqli->query($sql);

        $user = $query->fetch_assoc();
        
        if($user) {
            //Checks if password matches the password hash.
            if(password_verify($_POST["password"], $user["password_hash"])){
                die("Login Successful");
            }
        }

        $invalid = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">    
    <title>Login as Guest</title>
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
    <h1>Login as Guest</h1><br>
    <?php if($invalid){
            echo "<div class='alert alert-warning' role='alert'> Invalid login credentials </div>";
    }   
    ?>

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>