<?php
include "../conf/config.php";

session_start();

if (!isset($_SESSION['uname']) && !isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

// read
$sqlRead = sprintf("SELECT * FROM users WHERE userID=%s", $_SESSION['id']);
$result = $conn->query($sqlRead);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['userID'];
    $fname = $row['firstName'];
    $lname = $row['lastName'];
    $uname = $row['userName'];
    $pass = $row['password'];
    $email = $row['email'];
    $phone = $row['phone'];
    $role = $row['role'];
}

// update
if (isset($_POST['update'])) {
    $id = $_SESSION['id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $uname = $_POST['userName'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $role;

    $_SESSION['uname'] = $uname;

    // validate form
    if ($fname && $lname && $uname && $pass && $email && $phone && $role) {
        $sqlUpdate = "UPDATE users SET firstName=?, lastName=?, userName=?, password=?, email=?, phone=? WHERE userID=?;";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("ssssssi", $fname, $lname, $uname, $pass, $email, $phone, $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
        if ($stmt) {
            echo "<script>alert('Profile Successfully Updated!')</script>";
            header("refresh");
        } else {
            echo "<script>alert('Profile Error Updated!')</script>";
        }
    } else {
        echo "<script>alert('Fill Out the Blank Form!')</script>";
    }
}


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
                            <a class="nav-link" href="order.php">
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
                            <a class="nav-link active" href="profile.php">
                                <span data-feather="users"></span>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="../../assets/img/profile.png" alt="" width="72" height="72">
                    <h2>Profile - <?php echo strtoupper($_SESSION['uname']) ?></h2>
                </div>

                <div class="row g-5 w-auto">
                    <form class="needs-validation" action="#" method="post">
                        <div class="row g-3 px-5">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $fname; ?>" name="firstName" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lname; ?>" name="lastName" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $uname; ?>" name="userName" required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $email; ?>" name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Password</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?php echo $pass; ?>" name="password" required>
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="phone" class="form-label">Phone Number</span></label>
                                <input type="number" class="form-control" id="phone" placeholder="Apartment or suite" value="<?php echo $phone; ?>" name="phone" required>
                                <div class="invalid-feedback">
                                    Please enter your phone number.
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg mb-5" type="submit" name="update">Update</button>
                        </div>


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
</body>

</html>
