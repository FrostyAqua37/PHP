<?php
    //Database information
    $host = "localhost";
    $database = "login_db";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        //Prints out error when connecting to database if there are any
        die("Connection error: " . $mysqli->connect_errno);
    }
    return $mysqli;
?>
