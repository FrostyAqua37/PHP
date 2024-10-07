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
    

    echo "<strong>Sign-up Information</strong><br>";
    echo "<hr>";
    echo "<strong>First name: </strong>" . $_POST["firstName"] . "<br>";
    echo "Last name: " . $_POST["lastName"] . "<br>";
    echo "Email: " . $_POST["email"] . "<br>";
    echo "Telephone Number: " . $phone . "<br>";
    
    ?>
</body>
</html>

