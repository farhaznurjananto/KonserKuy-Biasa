<?php
include '../conf/config.php';

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

$op = $_GET['op'];
$id = $_GET['id'];
$uid = $_GET['uid'];
$not = $_GET['not'];
$od = $_GET['od'];
$pd = $_GET['pd'];
$tl = $_GET['total'];
$idC = $_GET['concert'];

// echo "<script>alert('$tl')</script>";
// echo $uid . $not . $od . $pd;
// echo $id . $op;


if ($op == "admit") {
    // error saat di acc
    // $sqlInsert = sprintf('INSERT INTO income(IDusers, numberOfTicket, orderDate, pictureOrder) VALUES (%u,%u,%s,%s)', $uid, $not, $od, $pd);
    $sqlInsert = "INSERT INTO income(IDusers, numberOfTicket, orderDate, pictureOrder, ticketPrice) VALUES ('$uid','$not','$od','$pd','$tl')";;
    if ($conn->query($sqlInsert) === TRUE) {
        $sqlDelete = sprintf('DELETE FROM orders WHERE ordersID=%s', $id);
        $conn->query($sqlDelete);
        $sqlUpdate = "UPDATE concert SET availableTicket=availableTicket-? WHERE concertID=?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param('ii', $not, $idC);
        $stmt->execute();
        $stmt->close();
        // echo "Order is Admited!";
        echo "<script>alert('Order is Admited!')</script>";
        header("Location: d_order.php");
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }


    // echo "<script>alert('Order is aaaaaaa!')</script>";
} else if ($op == "reject") {
    // echo "<script>alert('ini reject!')</script>";
    $sqlDelete = sprintf('DELETE FROM orders WHERE ordersID=%s', $id);
    if ($conn->query($sqlDelete) === TRUE) {
        // echo "<script>alert('ini reject2!')</script>";
        // $sqlUpdate = "UPDATE concert SET availableTicket=availableTicket+? WHERE concertID=?";
        // $stmt = $conn->prepare($sqlUpdate);
        // $stmt->bind_param('ii', $tl, $idC);
        // $stmt->execute();
        // $stmt->close();
        // if ($stmt) {
            echo "<script>alert('Order is Rejected!')</script>";
            header("Location: d_order.php");
        // }
        // echo "Order is Rejected!";
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
}
// header("refresh:0,url=d_order.php");

$conn->close();
