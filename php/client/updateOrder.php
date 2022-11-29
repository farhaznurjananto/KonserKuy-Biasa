<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

$id = $_GET['id'];
$idU = $_SESSION['id'];

$sqlRead = "SELECT * FROM orders JOIN concert ON orders.IDconcert=concert.concertID WHERE orders.ordersID=$id;";
$result = $conn->query($sqlRead);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $concertName = $row['concertName'];
    $place = $row['showPlace'];
    $time = $row['showTime'];
    $price = $row['ticketPrice'];
    $poster = $row['concertPicture'];
    $ordersID = $row['ordersID'];
    $IDusers = $row['IDusers'];
    $IDconcert = $row['IDconcert'];
    $numberOfTicket = $row['numberOfTicket'];
    $orderDate = $row['orderDate'];
    $picture = $row['pictureOrder'];
    $availableTicket = $row['availableTicket'];
  }
}

if (isset($_POST['update'])) {
    $filename = $_FILES["picture"]["name"];
    $newTicket = $_POST['amount'];
    if ($filename == "") {
        $filename = $picture;
    } else {
        $tempname = $_FILES["picture"]["tmp_name"];
        $folder = "../../assets/img/".$filename;

        if (move_uploaded_file($tempname, $folder)) {

        }
    }

    if ($newTicket && $filename) {
        $sisaTicket = $availableTicket-$newTicket;
        if ($sisaTicket >= 0) {
            $sqlUpdate = "UPDATE orders SET numberOfTicket=?, pictureOrder=? WHERE ordersID=?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bind_param("isi", $newTicket, $filename, $id);
            $stmt->execute();
            $stmt->close();
            if ($stmt) {
                echo "<script>alert('Tiket Berhasil Diupdate, lihat di order untuk info lebih lanjut!')</script>";
                header("refresh:0,url=product.php");
            } else {
                echo "<p>Error</p>";
            }
        } else {
            echo "<script>alert('Tiket Tidak Mencukupi!')</script>";
        }
    } else {
        echo "<script>alert('Masukkan semua data!')</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.84.0" />
    <title>KonserKuy | Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/" />

    <!-- Bootstrap core CSS -->
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="../../assets/dist/css/dashboard.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo $_SESSION['uname']; ?></a>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" /> -->
        <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../logout.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3 d-flex justify-content-around mt-auto">
                <div class="card shadow-sm">
                    <img src="../../assets/img/<?php echo $poster; ?>" alt="">
                    <rect width="100%" height="100%" fill="#55595c" />

                    <div class="card-body">
                        <h4 class="card-text text-center fw-bolder"><?php echo $concertName; ?></h4>
                        <hr>
                        <p class="card-text">
                        <table align="center">
                            <tr>
                                <td class="fw-bold">Pemesan</td>
                                <td>: <?php echo $_SESSION['uname']?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tempat Konser</td>
                                <td>: <?php echo $place?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Waktu Konser</td>
                                <td>: <?php echo $time?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Harga Tiket</td>
                                <td>: <?php echo $price?></td>
                            </tr>
                        </table>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <table align="center">
                                <tr>
                                    <td class="fw-bold"><label for="amount">Tiket yang dipesan</label></td>
                                    <td>: <input type="number" name="amount" id="amount" required value="<?php echo $numberOfTicket?>"></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold"><label for="amount">No Rekening</label></td>
                                    <td>: <span class="fw-bold text-danger">REX XXXX XXXX XXXX </span>
                                    </td>
                                </tr>
                            </table>
                            <div class="input-group mb-3 mt-3">
                                <input type="file" class="form-control" id="inputGroupFile01" name="picture" value="<?php echo $picture;?>">
                            </div>
                            <p>Lihat bukti pembayaran disini: <a href="../../assets/img/<?php echo $picture?>" target="_blank"><?php echo $picture?></a></p>
                            <div class="d-flex justify-content-around mt-3">
                                <a href="order.php" class="btn btn-warning">Back</a>
                                <button type="submit" class="btn btn-primary" name="update">Update Order</button>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>

    <footer class="text-muted py-5 ">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">KonserKuy &copy; Situs resmi untuk cara mudah memsan tiket konser!</p>
            <p class="mb-0">See your orders? <a href="order.php">Sgo to orders page</a> or See your history?</p> <a href="history.php">go to history page</a>.</p>
        </div>
    </footer>

    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../../assets/dist/js/dashboard.js"></script>
</body>

</html>
