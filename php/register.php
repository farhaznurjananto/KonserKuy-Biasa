<?php
include 'conf/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>KonserKuy | Sign Up</title>

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

<body>

    <div class="container-fluid">
        <div class="row d-flex justify-content-around">
            <main class="col-lg-4">

                <div class="row g-5 w-auto">
                    <form class="needs-validation form-data" method="post" id="form-data">
                        <div class="text-center">
                            <img class="d-block mx-auto mb-3" src="../assets/img/logo.png" alt="" width="72" height="72">
                            <h2 class="h3 fw-normal mb-3">Sign Up</h2>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" name=" firstName" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" name="lastName" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="userName" required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Password</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="password" required>
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="phone" class="form-label">Phone Number</span></label>
                                <input type="number" class="form-control" id="phone" placeholder="Apartment or suite" name="phone" required>
                                <div class="invalid-feedback">
                                    Please enter your phone number.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit" name="register">Sign Up</button>
                        <p>All ready have account? <a href="index.php">Sign Ip</a></p>
                    </form>
                </div>
            </main>
        </div>
    </div>
    </main>

    <!-- ajax -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).on('submit', "#form-data", function(e) {
            e.preventDefault()
            var data = $('.form-data').serialize();
            $.ajax({
                type: 'POST',
                url: "insertAccount.php",
                data: data,
                success: function() {
                    location.href = "index.php"
                    alert('Account Successfully Created!')
                },
                error: function() {
                    alert('Created Account Failed!')
                }
            });
        });
    </script>
</body>

</html>