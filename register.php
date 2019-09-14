<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

                            <div class="card-body">
                                <form method="POST" action="/Marlin_Materialy/bd_register.php">

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                <h5>
                                                  <?php
                                                  session_start();
                                                  if (isset($_SESSION['flash_register_name'])) {
                                                      echo $_SESSION['flash_register_name'];
                                                      unset($_SESSION['flash_register_name']);
                                                  }
                                                  ?>
                                                </h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" >
                                            <h5>
                                              <?php
                                              if (isset($_SESSION['flash_register_email'])) {
                                                  echo $_SESSION['flash_register_email'];
                                                  unset($_SESSION['flash_register_email']);
                                              }
                                              if (isset($_SESSION['flash_register_email_form'])) {
                                                  echo $_SESSION['flash_register_email_form'];
                                                  unset($_SESSION['flash_register_email_form']);
                                              }
                                              ?>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input  type="password" class="form-control " name="password"  autocomplete="new-password">
                                            <?php
                                            if (isset($_SESSION['flash_register_password'])) {
                                                echo $_SESSION['flash_register_password'];
                                            }
                                            if (isset($_SESSION['flash_register_password_min'])) {
                                                echo $_SESSION['flash_register_password_min'];
                                            }
                                            if (isset($_SESSION['flash_register_password_verify'])) {
                                                echo $_SESSION['flash_register_password_verify'];
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input <  type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                            <?php
                                            if (isset($_SESSION['flash_register_password'])) {
                                                echo $_SESSION['flash_register_password'];
                                                unset($_SESSION['flash_register_password']);
                                            }
                                            if (isset($_SESSION['flash_register_password_min'])) {
                                                echo $_SESSION['flash_register_password_min'];
                                                unset($_SESSION['flash_register_password_min']);
                                            }
                                            if (isset($_SESSION['flash_register_password_verify'])) {
                                                echo $_SESSION['flash_register_password_verify'];
                                                unset($_SESSION['flash_register_password_verify']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
