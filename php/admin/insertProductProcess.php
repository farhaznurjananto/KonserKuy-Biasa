<?php
include '../conf/config.php';

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

// link up
$targetDir = '../../assets/img/';

$concertPicture = $_POST['picture'];
$concertName = $_POST['concertName'];
$band = $_POST['band'];
$showPlace = $_POST['showPlace'];
$showTime = $_POST['showTime'];
$ticketPrice = $_POST['ticketPrice'];
$availableTicket = $_POST['availableTicket'];
$description = $_POST['description'];
$status = "0";

// validate form
if ($concertPicture && $concertName && $band && $showPlace && $showTime && $ticketPrice && $availableTicket && $description) {

    $allowTypes = array('jpg', 'png', 'jpeg');
    if (!!$_FILES['file']['tmp_name']) {
        $info = explode(".", strtolower($_FILES['file']['tmp_name']));
        if (in_array(end($info), $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetDir . basename($_FILES['file']['name']))) {
                echo "<script>alert('Berhasil di Upload')</script>";
                $sqlUpdate = "INSERT INTO concert(concertPicture, concertName, band, showPlace, showTime, ticketPrice, availableTicket, description, concertStatus) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("sssssiisi", $concertPicture, $concertName, $band, $showPlace, $showTime, $ticketPrice, $availableTicket, $description, $status);
                $stmt->execute();
                $stmt->close();
                $conn->close();

                if ($stmt) {
                    echo "<script>alert('Concert Successfully Inserted! Open Pre-Order in Product Page')</script>";
                    header("refresh:0,url:d_porduct.php");
                } else {
                    echo "<script>alert('Concert Error Inserted!')</script>";
                }
            }
        } else {
            echo "<script>alert('Fill Out the Blank Form!')</script>";
        }
        // if (in_array($fileType, $allowTypes)) {
        //     if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
        //     }
        // }
    }
} else {
    echo "<script>alert('Fill Out the Blank Form!')</script>";
}
