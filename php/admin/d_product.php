<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
  header("Location: ../index.php");
}

// read concert
$sql1 = "SELECT * FROM concert ORDER BY showTime ASC";
$result = $conn->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,  initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.84.0" />
  <title>KonserKuy | Products</title>

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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">KonserKuy</a>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="../logout.php">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="d_dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="d_order.php">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="d_product.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="d_report.php">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="d_profile.php">
                <span data-feather="users"></span>
                Profile
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

        <div class="container-fluid d-flex justify-content-between">
          <h2>Concert</h2>
          <a class="btn btn-primary" href="d_insertConcert.php" role="button">Insert</a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Poster</th>
                <th scope="col">Consert Name</th>
                <th scope="col">Artist</th>
                <th scope="col">Place</th>
                <th scope="col">Time</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Available Ticket</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
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
                <tr>
                  <td><?php echo $id ?></td>
                  <td><img src="../../assets/img/<?php echo $poster ?>" alt="" width="50px" height="50px"><b><a href="../../assets/img/<?php echo $poster ?>" target="blank"><?php echo $name ?></a></b></td>
                  <td><?php echo $name ?></td>
                  <td><?php echo $band ?></td>
                  <td><?php echo $place ?></td>
                  <td><?php echo $time ?></td>
                  <td><?php echo $price ?></td>
                  <td><?php echo $amount ?></td>
                  <td><?php echo $description ?></td>
                  <td>
                    <?php if ($status == 1) { ?>
                      <span class="badge bg-success">Open</span>
                    <?php } elseif ($status == 0) { ?>
                      <span class="badge bg-danger">Close</span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($row['concertStatus'] == 1) { ?>
                      <a href="closeConcert.php?id=<?php echo $id ?>&status=<?php echo $status ?>" class="btn btn-outline-danger" name="update">Close</a>
                      <!-- <button type="button" name="close" class="btn btn-outline-danger" id="close" onclick="gateConcert($id)">Close</button> -->
                    <?php } elseif ($row['concertStatus'] == 0) { ?>
                      <a href="closeConcert.php?id=<?php echo $id ?>&status=<?php echo $status ?>" class="btn btn-outline-success" name="update">Open</a>
                      <!-- <button type="button" name="open" class="btn btn-outline-success" id="open" onclick="gateConcert($id)">Open</button> -->
                    <?php } ?>
                    <a href="d_updateProduct.php?id=<?php echo $id ?>" class="btn btn-warning" name="update">Update</a>
                    <!-- <a href="deleteProductProcess.php?id=<?php echo $id ?>" class="btn btn-danger" name="delete">Delete</a> -->
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../../assets/dist/js/dashboard.js"></script>
  <!-- ajax -->
  <script src="../../assets/dist/js/script.js"></script>
</body>

</html>
