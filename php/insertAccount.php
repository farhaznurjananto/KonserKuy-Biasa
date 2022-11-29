<?php
include 'conf/config.php';


$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$uname = $_POST['userName'];
$pass = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = "user";

if ($fname && $lname && $uname && $pass && $email && $phone && $role) {
    $sqlInsert = "INSERT INTO users(firstName, lastName, userName, password, email, phone, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("sssssss", $fname, $lname, $uname, $pass, $email, $phone, $role);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($stmt) {
        echo "<script>alert('Account Successfully Created!')</script>";
        // header("Location: login.php");
        header("refresh:0,url=index.php");
    } else {
        echo "<script>alert('Created Account Failed!')</script>";
    }
} else {
    echo "<script>alert('Fill Out the Blank Form!')</script>";
}

// $fname = $_POST['firstName'];
// $lname = $_POST['lastName'];
// $uname = $_POST['userName'];
// $pass = $_POST['password'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $role = "user";


// $sqlInsert = "INSERT INTO users(firstName, lastName, userName, password, email, phone, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
// $stmt = $conn->prepare($sqlInsert);
// $stmt->bind_param("sssssss", $fname, $lname, $uname, $pass, $email, $phone, $role);
// $stmt->execute();
// $stmt->close();
// $conn->close();

// if ($stmt) {
//     echo "Successfully inserted";
// } else {
//     echo "Error inserted";
// }
