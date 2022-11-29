<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

$sql = sprintf("SELECT * FROM orders JOIN users ON orders.IDusers=users.userID JOIN concert ON orders.IDconcert=concert.concertID WHERE users.userID=%s", $_SESSION['id']);
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
    <title>KonserKuy | Order</title>

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

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="product.php">
                                <span data-feather="home"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="order.php">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">
                                <span data-feather="bar-chart-2"></span>
                                Histories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <span data-feather="users"></span>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

                <h2>Your Ourdering Reports</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Concert Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Price</th>
                                <th scope="col">Proof of Payment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {

                                $id = $row["ordersID"];
                                $userName = $row["userName"];
                                $email = $row["email"];
                                $orderDate = $row["orderDate"];
                                $concertName = $row["concertName"];
                                $numberOfTicket = $row["numberOfTicket"];
                                $ticketPrice = $row["ticketPrice"];
                                $pictureOrder = $row["pictureOrder"];
                                $concertID = $row["IDconcert"];

                                $total = $ticketPrice * $numberOfTicket;
                            ?>
                                <tr>
                                    <td><?php echo $userName; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $orderDate; ?></td>
                                    <td><?php echo $concertName; ?></td>
                                    <td><?php echo $numberOfTicket; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><a href="../../assets/img/<?php echo $pictureOrder; ?>" target="blank"><?php echo $pictureOrder; ?></a></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <!-- <button type="button" name="admit" class="btn btn-warning">Update</button> -->
                                        <!-- <button type="button" name="reject" class="btn btn-danger">Cancel</button> -->
                                        <a href="updateOrder.php?id=<?php echo $id ?>" name="update" class="btn btn-warning">Update</a>
                                        <a href="deleteOrderProcess.php?id=<?php echo $id; ?>&concert=<?php echo $concertID ?>&ticket=<?php echo $total ?>" name="cancel" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
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
