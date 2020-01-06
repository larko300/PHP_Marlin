<?php
$comment_id = $_POST['delete'];
// database action
$queryBuilder = include __DIR__ . '/../database/start.php';
$queryBuilder->delete('comment', 'id_comment', $comment_id);
header('Location: /admin');
