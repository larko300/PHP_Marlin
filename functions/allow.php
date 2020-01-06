<?php
$comment_id = $_POST['allow'];
// database action
$queryBuilder = include __DIR__ . '/../database/start.php';
$queryBuilder->update('comment', [
  'comment_status' => '1',
], 'id_comment', $comment_id);
header('Location: /admin');
