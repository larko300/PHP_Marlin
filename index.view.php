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
                        <?php if(isset($_SESSION['name_varify'])){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile"><?php
                                if (isset($_SESSION['name_varify'])) {
                                    echo $_SESSION['name_varify'];
                                }
                                 ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
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
                            <div class="card-header"><h3>Комментарии</h3></div>

                            <div class="card-body">
                              <div class="alert alert-success" role="alert">
                                <?php
                                if (isset($_SESSION['flash_comment_succ'])) {
                                    echo $_SESSION['flash_comment_succ'];
                                    unset($_SESSION['flash_comment_succ']);
                                }

                                ?>
                              </div>

                              <?php foreach ($users_comments as $user_comment): ?>

                                <div class="media">
                                  <img src="<?php echo "img/" . $user_comment['image'] ?>" class="mr-3" alt="..." width="64" height="64">
                                  <div class="media-body">
                                    <h5 class="mt-0"><?php echo $user_comment['username']; ?></h5>
                                    <span><small><?php echo $user_comment['date']; ?></small></span>
                                    <p>
                                      <?php echo $user_comment['comment']; ?>
                                    </p>
                                  </div>
                                </div>

                              <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Оставить комментарий</h3></div>

                            <div class="card-body">
                              <?php if (isset($_SESSION['name_varify'])) :?>
                                <form action="/create" method="post">
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <h5>
                                    <?php
                                    if (isset($_SESSION['flash_comment'])) {
                                        echo $_SESSION['flash_comment'];
                                        unset($_SESSION['flash_comment']);
                                    }
                                    ?>
                                    </h5>
                                  </div>
                                  <button type="submit" class="btn btn-success">Отправить</button>
                                </form>
                            <?php else: ?>
                             <h4>Что бы оставить комментарий <a href="/login">войдите</a> или <a href="/register">зарегистрируйтесь</a></h4>
                           <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
