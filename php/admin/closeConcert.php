<?php
include '../conf/config.php';

session_start();
$id = $_GET['id'];
$status = $_GET['status'];

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

if ($status == 1) {
    // UPDATE `concert` SET `concertStatus`='0' WHERE 1;
    $sqlUpdate = "UPDATE concert SET concertStatus='0' WHERE concertID=?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        // echo "<script>alert('Close Concert Successfully!')</script>";
        header("refresh:0,url=d_product.php");
    } else {
        echo "<script>alert('Close Concert Error!')</script>";
    }
} else if ($status == 0) {
    $sqlUpdate = "UPDATE concert SET concertStatus='1' WHERE concertID=?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        // echo "<script>alert('Open Concert Successfully!')</script>";
        header("refresh:0,url=d_product.php");
    } else {
        echo "<script>alert('Open Concert Error!')</script>";
    }
}
