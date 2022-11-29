<?php
include 'conf/config.php';

if (isset($_POST['reset'])) {
  $pass = $_POST['password'];
  $passRetype = $_POST['confirmPassword'];
  $email = $_GET['email'];

  if ($pass && $passRetype) {
    $verified = $pass === $passRetype;
    if ($verified) {
      $sqlUpdate = "UPDATE users SET password=? WHERE email=?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("ss", $passRetype, $email);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      echo "<script>alert('Password has been reset!')</script>";
      header('location: index.php');
    } else {
      echo "<script>alert('Password not same!')</script>";
      // header('refresh:0,url:newPw.php');
    }
  } else {
    echo "<script>alert('input data correctly!')</script>";
    // header('refresh:0,url:newPw.php');
  }
}
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
                        Reset your password if you foget it.
                    </p>
                    <form class="" action="" method="post">
                      <div class="form-outline">
                          <input type="email" name="email" id="typeEmail" class="form-control my-3" placeholder="Enter your email!" required />
                          <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control my-3" required />
                          <input type="password" name="confirmPassword" id="password" placeholder="Retype your password" class="form-control my-3" required />
                          <!-- <label class="form-label" for="typeEmail">Email input</label> -->
                      </div>
                      <!-- <input type="submit" name="changePassword" value="Save"> -->
                      <button type="submit" name="reset" class="btn btn-primary">Reset</button>
                    </form>
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
