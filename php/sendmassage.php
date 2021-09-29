<?php
require "functions/sendmail.php";
$data = $_POST;
$title = "Отзыв о сайте UFCclub";
sendMail($data['text'], $title, $data['email']);
echo "done";
