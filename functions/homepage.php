<?php
$queryBuilder = include __DIR__ . '/../database/start.php';
$users_comments = $queryBuilder->getAllJoinWhere('comment', 'users', 'user_id', 'comment_status', '1');
session_start();
include __DIR__ . '/../index.view.php';
