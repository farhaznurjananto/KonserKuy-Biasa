<?php
include '../conf/config.php';

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

$id = $_GET['id'];
$ticket = $_GET['ticket'];
$concertID = $_GET['concert'];
$sqlDelete = "DELETE FROM orders WHERE ordersID=?";
$stmt = $conn->prepare($sqlDelete);
$stmt->bind_param('i', $id);
$stmt->execute();

if ($stmt) {
    // $sqlUpdate = "UPDATE concert SET availableTicket=availableTicket+? WHERE concertID=?";
    // $stmt = $conn->prepare($sqlUpdate);
    // $stmt->bind_param('ii', $ticket, $concertID);
    // $stmt->execute();
    // $stmt->close();
    // if ($stmt) {
    //     echo "<script>alert('Order Ticket Successfully Deleted!')</script>";
    //     header("Location: order.php");
    // }
    echo "<script>alert('Order Ticket Successfully Deleted!')</script>";
    header("Location: order.php");
} else {
    echo "<script>alert('Error Deleted Error!')</script>";
}

$conn->close();
