<?php
require "db.php";
$data = $_POST;
$fighters = R::find("fighters", "LIMIT ?,?", [(int)$data['countFighters'], (int)$data['howMany']]);
echo json_encode($fighters);
