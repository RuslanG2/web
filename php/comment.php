<?php
require "db.php";
$data = $_POST;
$comment = R::dispense('comments');
$comment->user_name = $data['name'];
$comment->user_email = $data['email'];
$comment->comment_text = $data['text'];
$comment->date = date('Y-m-d H:i');
$comment->fighter = R::load('fighters', $data['id']);
R::store($comment);
echo "success";
