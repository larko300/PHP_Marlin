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

  <?php

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "blog";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = 'SELECT * FROM comment_form';
  $statement = $conn->query($sql);
  $users_comments = $statement->fetchAll(PDO::FETCH_ASSOC);
  session_start();

   ?>
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
                        <?php if(isset($_SESSION['name_varify'])){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php"><?php
                                if (isset($_SESSION['name_varify'])) {
                                    echo $_SESSION['name_varify'];
                                }
                                 ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="log_out.php">logout</a>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                      <?php  } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Админ панель</h3></div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Аватар</th>
                                            <th>Имя</th>
                                            <th>Дата</th>
                                            <th>Комментарий</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>

                                    <?php foreach ($users_comments as $user_comment): ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="img/no-user.jpg" alt="" class="img-fluid" width="64" height="64">
                                            </td>
                                            <td><?php echo $user_comment['username']; ?></td>
                                            <td><?php echo $user_comment['date_comment']; ?></td>
                                            <td><?php echo $user_comment['comment']; ?></td>
                                            <td>
                                              <form>
                                                <button type="submit" name="button_allow" formaction="/Marlin_Materialy/db_admin_allow.php" formmethod="get" class="btn btn-success" value="<?php if (isset($user_comment['id_comment']))  echo $user_comment['id_comment']; ?>">Разрешить</button>
                                              </form>
                                              <form>
                                                <button type="submit" name="button_ban" formaction="/Marlin_Materialy/db_admin_ban.php" formmethod="get" class="btn btn-warning" value="<?php if (isset($user_comment['id_comment']))  echo $user_comment['id_comment']; ?>">Запретить</button>
                                              </form>
                                              <form>
                                                <button type="submit" onclick="return confirm('are you sure?')" formaction="/Marlin_Materialy/db_admin_delete.php" formmethod="get" name="button_delete" class="btn btn-danger" value="<?php if (isset($user_comment['id_comment']))  echo $user_comment['id_comment']; ?>">Удалить</button>
                                              </form>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
