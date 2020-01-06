<?php session_start(); ?>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
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
                                <a class="nav-link" href="/logout">logout</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Профиль пользователя</h3></div>

                        <div class="card-body">
                          <div class="alert alert-success" role="alert">
                            <?php if(isset($_SESSION['flash_succ_update'])) echo $_SESSION['flash_succ_update']; unset($_SESSION['flash_succ_update']) ;?>
                          </div>

                            <form action="/profile/validation" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" class="form-control" name="name"  value="<?php if(isset($_SESSION['name_varify'])) echo $_SESSION['name_varify']; ?>">
                                            <h4 style="color:red"><?php if(isset($_SESSION['flash_profile_name'])) echo $_SESSION['flash_profile_name']; unset($_SESSION['flash_profile_name']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['flash_profile_empty_messege'])) echo $_SESSION['flash_profile_empty_messege']; unset($_SESSION['flash_profile_empty_messege']);?></h4>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="email" class="form-control is-invalid" name="email" value="<?php if(isset($_SESSION['email_varify'])) echo $_SESSION['email_varify']; ?>">
                                            <h4 style="color:red"><?php if(isset($_SESSION['flash_profile_email'])) echo $_SESSION['flash_profile_email']; unset($_SESSION['flash_profile_email']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['flash_profile_email_recurrent'])) echo $_SESSION['flash_profile_email_recurrent']; unset($_SESSION['flash_profile_email_recurrent']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['flash_profile_empty_messege'])) echo $_SESSION['flash_profile_empty_messege']; unset($_SESSION['flash_profile_empty_messege']);?></h4>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Аватар</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php if(isset($_SESSION['user_image'])){echo __DIR__ . 'img/no-user.jpg'.$_SESSION['user_image'];}else {echo __DIR__ . 'img/no-user.jpg';}?>"string";" alt="" class="img-fluid">
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-warning">Edit profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-header"><h3>Безопасность</h3></div>

                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <?php if(isset($_SESSION['succ_update_pass'])) echo $_SESSION['succ_update_pass']; unset($_SESSION['succ_update_pass']);?>
                            </div>

                            <form action="/profile/password/validation" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Current password</label>
                                            <input type="password" name="current" class="form-control" id="exampleFormControlInput1">
                                            <h4 style="color:red"><?php if(isset($_SESSION['empty_flash'])) echo $_SESSION['empty_flash']; unset($_SESSION['empty_flash']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['password_verify_prof_flash'])) echo $_SESSION['password_verify_prof_flash']; unset($_SESSION['password_verify_prof_flash']);?></h4>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">New password</label>
                                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                                            <h4 style="color:red"><?php if(isset($_SESSION['empty_flash'])) echo $_SESSION['empty_flash']; unset($_SESSION['empty_flash']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['confirmation_prof_flash'])) echo $_SESSION['confirmation_prof_flash']; unset($_SESSION['confirmation_prof_flash']);?></h4>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Password confirmation</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                                            <h4 style="color:red"><?php if(isset($_SESSION['empty_flash'])) echo $_SESSION['empty_flash']; unset($_SESSION['empty_flash']);?></h4>
                                            <h4 style="color:red"><?php if(isset($_SESSION['confirmation_prof_flash'])) echo $_SESSION['confirmation_prof_flash']; unset($_SESSION['confirmation_prof_flash']);?></h4>
                                        </div>

                                        <button class="btn btn-success">Submit</button>
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
