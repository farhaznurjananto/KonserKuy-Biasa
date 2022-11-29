<?php
    $hostname = 'localhost';
    $username = 'tib212410102005';
    $password = 'secret';
    $database = 'db212410102005';

    // create connection\
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connection successfully";
?>
