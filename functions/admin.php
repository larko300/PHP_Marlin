<?php
$queryBuilder = include __DIR__ . '/../database/start.php';
$users_comments = $queryBuilder->getAllJoin('comment', 'users', 'user_id');
include __DIR__ . '/../admin.view.php';
