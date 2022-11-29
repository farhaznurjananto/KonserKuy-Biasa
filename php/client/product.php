<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
  header("Location: ../index.php");
}

$sql1 = "SELECT * FROM concert WHERE concertStatus=1 AND availableTicket>0 ORDER BY showTime ASC";
$result = $conn->query($sql1);
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

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="profile.php"><?php echo $_SESSION['uname']; ?></a>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" /> -->
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="../logout.php">Sign out</a>
      </div>
    </div>
  </header>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">KonserKuy</h1>
        <p class="lead text-muted">Ayo buruan beli tiket konser di KonserKuy dijamin paling murah digerai tiket manapun.</p>
        <p>
          <a href="order.php" class="btn btn-primary my-2">Order</a>
          <a href="history.php" class="btn btn-secondary my-2">History</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class=" row d-flex justify-content-around">
        <?php while ($row = $result->fetch_assoc()) {
          $id = $row['concertID'];
          $poster = $row['concertPicture'];
          $name = $row['concertName'];
          $band = $row['band'];
          $place = $row['showPlace'];
          $time = $row['showTime'];
          $price = $row['ticketPrice'];
          $amount = $row['availableTicket'];
          $description = $row['description'];
          $status = $row['concertStatus'];
        ?>
          <div class="card shadow-sm my-3" style="width: 25rem">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="<?php echo $poster ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
            <img src="../../assets/img/<?php echo $poster ?>" alt="">
            <!-- <p><?php echo $poster ?></p> -->
            <!-- <img src="../../assets/img/<? echo $poster ?>" alt=""> -->
            <rect width="100%" height="100%" fill="#55595c" />

            <div class="card-body">
              <h4 class="card-text fw-bolder"><?php echo $name ?></h4>
              <p class="card-text">
              <table>
                <tr>
                  <td class="fw-bold">Tempat Konser</td>
                  <td><?php echo ": " . $place ?></td>
                </tr>
                <tr>
                  <td class="fw-bold">Waktu Konser</td>
                  <td><?php echo ": " . $time ?></td>
                </tr>
                <tr>
                  <td class="fw-bold">Harga Tiket</td>
                  <td><?php echo ": " . $price ?></td>
                </tr>
              </table>
              </p>
              <p class="card-text"><?php echo $description ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="buy.php?concertID=<?php echo $id ?>" class="btn btn-primary btn-sm">Buy Ticket</a>
                <!-- <button type="submit" class="btn btn-primary btn-sm">Buy Ticket</button> -->
                <small class="text-muted"><?php echo "Tersedia : " . $amount ?></small>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  </main>

  <footer class="text-muted py-5">
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
