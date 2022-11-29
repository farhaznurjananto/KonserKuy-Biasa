<?php
include "conf/config.php";

error_reporting(0);

session_start();

if (isset($_POST['login'])) {
    // $uname = $mysqli->real_escape_string($_POST['username']);
    // $pass = $mysqli->real_escape_string($_POST['password']);
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE userName='$uname' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['uname'] = $row['userName'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['userID'];

        if ($_SESSION['role'] === 'admin') {
            header("Location: admin/d_dashboard.php");
        } else {
            header("Location: client/product.php");
        }
    } else {
        echo "<script>alert('Wrong username or password. Please try again!')</script>";
    }
    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>KonserKuy | Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../assets/dist/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="#" method="post">
            <img class="mb-4" src="../assets/img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username...." name="username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <a href="forgot.php">Forgot password?</a>

            <hr>
            <!-- <input type="checkbox" value="remember-me"> Remember me -->

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
            <p>Don't have account? <a href="register.php">Sign Up</a></p>
            <p class="mt-5 mb-3 text-muted">KonserKuy &copy; 2022</p>
        </form>
    </main>

</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonserKuy | Login</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <br>
        <a href="forgot.php">Forgot password?</a>

        <br>
        <button type="submit" name="login" id="login">Login</button>
    </form>
</body>
</html> -->
