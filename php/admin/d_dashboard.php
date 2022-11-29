<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
  header("Location: ../index.php");
}

// order
$sql1 = "SELECT COUNT(*) FROM orders;";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

// product
$sql2 = "SELECT COUNT(*) FROM concert;";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

// report
$sql3 = "SELECT COUNT(*) FROM income;";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();

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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">KonserKuy</a>
    <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> -->
    <!-- </button> -->
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" /> -->
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-white" href="../logout.php">Sign out</a>
    </div>
  </header>

  <div class="container-fluid">

    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="d_dashboard.php">
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
              <a class="nav-link" href="d_product.php">
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
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li> -->
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
          <h1 class="display-4 fw-normal">Dashboard Record</h1>
          <p class="fs-5 text-muted">Berisikan record data mengenai jumlah order, jumlah product, income yang masuk</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Orders</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $row1['COUNT(*)']; ?></h1>
                <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Go to Orders</button> -->
                <a href="d_order.php" class="w-100 btn btn-lg btn-outline-primary">Go to Orders</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Products</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $row2['COUNT(*)']; ?></h1>
                <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Go to Products</button> -->
                <a href="d_product.php" class="w-100 btn btn-lg btn-outline-primary">Go to Products</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Reports</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $row3['COUNT(*)']; ?></h1>
                <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Go to Reports</button> -->
                <a href="d_report.php" class="w-100 btn btn-lg btn-outline-primary">Go to Reports</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    </main>
  </div>

  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../../assets/dist/js/dashboard.js"></script>
</body>

</html>
