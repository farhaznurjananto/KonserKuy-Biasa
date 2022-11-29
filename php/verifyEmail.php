<?php
include 'php/conf/config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonserKuy | Forgot Password</title>

    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css.map">

</head>

<body class="bg-light">
    <form action="" method="post" autocomplete="off">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card text-center" style="width: 300px;">
                <div class="card-header h5 text-white bg-primary">Password Reset</div>
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        Enter your email address and we'll send you an email with instructions to reset your password.
                    </p>
                    <div class="form-outline">
                        <input type="email" name="email" id="typeEmail" class="form-control my-3" required />
                        <label class="form-label" for="typeEmail">Email input</label>
                    </div>
                    <input type="submit" name="forgot" value="Check">
                    <!-- <a href="#" class="btn btn-primary w-100">Reset password</a> -->
                    <div class="d-flex justify-content-between mt-4">
                        <a class="" href="index.php">Login</a>
                        <a class="" href="register.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js.map"></script>
</body>

</html>