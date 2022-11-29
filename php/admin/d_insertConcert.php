<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

if (isset($_POST['insert'])) {


    // $concertPicture = $_POST['picture'];
    $concertName = $_POST['concertName'];
    $band = $_POST['band'];
    $showPlace = $_POST['showPlace'];
    $showTime = $_POST['showTime'];
    $ticketPrice = $_POST['ticketPrice'];
    $availableTicket = $_POST['availableTicket'];
    $description = $_POST['description'];
    $status = "0";

    // // upload
    // $filename = $_FILES["picture"]["name"];
    // $tempname = $_FILES["picture"]["tmp_name"];
    // $folder = "../../assets/img/" . $filename;
    // coba
    $filename = $_FILES["picture"]["name"];
    // echo $filename;
    $tempname = $_FILES["picture"]["tmp_name"];
    // echo "<script>alert('$tempname')</script>";
    // echo $tempname;
    $folder = "../../assets/img/".$filename;

    if (move_uploaded_file($tempname, $folder)) {
        // echo "<script>alert('coba1')</script>";
        if ($filename && $concertName && $band && $showPlace && $showTime && $ticketPrice && $availableTicket && $description) {


            $sqlUpdate = "INSERT INTO concert(concertPicture, concertName, band, showPlace, showTime, ticketPrice, availableTicket, description, concertStatus) VALUES (?,?,?,?,?,?,?,?,?)";


            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bind_param("sssssiisi", $filename, $concertName, $band, $showPlace, $showTime, $ticketPrice, $availableTicket, $description, $status);
            $stmt->execute();
            $stmt->close();

            //uploaded
            // if (move_uploaded_file($tempname, $folder)) {
            //     echo "<h3>  Image uploaded successfully!</h3>";
            // } else {
            //     echo "<h3>  Failed to upload image!</h3>";
            // }

            if ($stmt) {
                echo "<script>alert('Concert Successfully Inserted! Open Pre-Order in Product Page')</script>";
                header("refresh:0,url:d_insertConcert.php");
            } else {
                echo "<script>alert('Concert Error Inserted!')</script>";
            }
        } else {
            echo "<script>alert('Fill Out the Blank Form!')</script>";
        }
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
    <link href="../../assets/dist/css/form-validation.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">KonserKuy</a>
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
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
                <div class="py-5 text-center">
                    <!-- <img class="d-block mx-auto mb-4" src="../../assets/img/profile.png" alt="" width="72" height="72"> -->
                    <h2>Insert Porduct</h2>
                </div>

                <div class="row g-5 w-auto">
                    <form class="needs-validation form-floating form-data" method="post" action="" id="form-data" enctype="multipart/form-data">
                        <div class="row g-3 px-5">
                            <div class="col-12">
                                <label for="phone" class="form-label">Poster Concert</span></label>
                                <input type="file" class="form-control" name="picture" required>
                                <div class="invalid-feedback">
                                    Please enter your Poster Concert.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="concertName" class="form-label">Concert name</label>
                                <input type="text" class="form-control" id="concertName" placeholder="Concert name" name="concertName" required>
                                <div class="invalid-feedback">
                                    Concert name required
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="band" class="form-label">Band</label>
                                <input type="text" class="form-control" id="band" placeholder="Concert name" name="band" required>
                                <div class="invalid-feedback">
                                    Band name required
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="showPlace" class="form-label">Show place</label>
                                <input type="text" class="form-control" id="showPlace" placeholder="Concert name" name="showPlace" required>
                                <div class="invalid-feedback">
                                    showplace required
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="showTime" class="form-label">Show date & time</span></label>
                                <input type="datetime-local" class="form-control" id="showTime" placeholder="Apartment or suite" name="showTime" required>
                                <div class="invalid-feedback">
                                    show & data time required
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="availableTicket" class="form-label">Available ticket</span></label>
                                <input type="number" class="form-control" id="availableTicket" placeholder="Apartment or suite" name="availableTicket" required>
                                <div class="invalid-feedback">
                                    Available ticket required
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="ticketPrice" class="form-label">Ticket price</span></label>
                                <input type="number" class="form-control" id="ticketPrice" placeholder="Apartment or suite" name="ticketPrice" required>
                                <div class="invalid-feedback">
                                    Ticket price required
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="description"></textarea>
                                <div class="invalid-feedback">
                                    description
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg mb-5" type="submit" name="insert">Insert</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../../assets/dist/js/dashboard.js"></script>
    <script src="../../assets/dist/js/form-validation.js"></script>

    <!-- ajax -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).on('submit', "#form-data", function(e) {
            e.preventDefault()
            var data = $('.form-data').serialize();
            $.ajax({
                type: 'POST',
                url: "insertProductProcess.php",
                data: data,
                success: function() {
                    location.href = "d_product.php"
                    alert('Concert Ticket Successfully Inserted!')
                },
                error: function() {
                    alert('Insert Consert Ticket Failed!')
                }
            });
        });
    </script> -->
</body>

</html>
