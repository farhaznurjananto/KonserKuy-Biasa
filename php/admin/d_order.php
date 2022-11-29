<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION["uname"]) && !isset($_SESSION["role"])) {
  header("Location: ../index.php");
}

$sql =
  "SELECT * FROM orders JOIN users ON orders.IDusers=users.userID JOIN concert ON orders.IDconcert=concert.concertID;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.84.0" />
  <title>KonserKuy | Orders</title>

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
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" /> -->
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
              <a class="nav-link" aria-current="page" href="d_dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="d_order.php">
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
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li> -->
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

        <h2>Orders</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Order Date</th>
                <th scope="col">Concert Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Proof of Payment</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) {

                $id = $row["ordersID"];
                $uid = $row["IDusers"];
                $idC = $row["IDconcert"];
                $userName = $row["userName"];
                $email = $row["email"];
                $orderDate = $row["orderDate"];
                $concertName = $row["concertName"];
                $numberOfTicket = $row["numberOfTicket"];
                $ticketPrice = $row["ticketPrice"];
                $pictureOrder = $row["pictureOrder"];
                $total = $row['ticketPrice'] * $row['numberOfTicket'];
              ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $userName; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $orderDate; ?></td>
                  <td><?php echo $concertName; ?></td>
                  <td><?php echo $numberOfTicket; ?></td>
                  <td><?php echo $total; ?></td>
                  <td><a href="../../assets/img/<?php echo $pictureOrder; ?>" target="blank"><?php echo $pictureOrder; ?></a></td>
                  <td>
                    <a href="<?php echo sprintf('admitProcess.php?id=%s&uid=%s&not=%s&total=%d&od=%s&pd=%s&op=admit&concert=%s', $id, $uid, $numberOfTicket, $total, $orderDate, $pictureOrder, $idC); ?>" name="admit" class="btn btn-success">Admit</a>
                    <a href="<?php echo sprintf('admitProcess.php?id=%s&uid=%s&not=%s&total=%d&od=%s&pd=%s&op=reject&concert=%s', $id, $uid, $numberOfTicket, $total, $orderDate, $pictureOrder, $idC); ?>" name="reject" class="btn btn-danger">Reject</a>
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
</body>

</html>
