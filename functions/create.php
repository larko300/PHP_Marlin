<?php

session_start();
$user_log_name = $_SESSION['name_varify'];
$comment = $_POST['comment'];
$today = date("y.m.d");

     if (!empty($comment)){
       $queryBuilder = include __DIR__ . '/../database/start.php';
       $queryBuilder->create('comment', [
         'comment' => $comment,
         'date' => $today,
         'user_id' => $_SESSION['user_id']
       ]);
       $_SESSION['flash_comment_succ'] = 'Комментарий успешно добавлен';
       header("Location: /");

     }
      else{
        $_SESSION['flash_comment'] = 'Введите комментарий';
        header("Location: /");
      }
