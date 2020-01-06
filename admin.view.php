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
                                            <td><?php echo $user_comment['id_comment']; ?></td>
                                            <td><?php echo $user_comment['date_comment']; ?></td>
                                            <td><?php echo $user_comment['comment']; ?></td>
                                            <td>
                                              <form action="/admin/allow" method="post">
                                                <button type="submit" name="allow" class="btn btn-success" value="<?php echo $user_comment['id_comment']?>">Разрешить</button>
                                              </form>
                                              <form action="/admin/ban" method="post">
                                                <button type="submit" name="ban" class="btn btn-warning" value="<?php echo $user_comment['id_comment']?>">Запртетить</button>
                                              </form>
                                              <form action="/admin/delete" method="post">
                                                <button type="submit" name="delete" class="btn btn-danger" value="<?php echo $user_comment['id_comment']?>">Удалить</button>
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
