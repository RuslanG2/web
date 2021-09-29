<?php
require 'db.php';
$id = $_POST['product_id'];
$product = R::load('shop', (int)$id);
echo json_encode($product);
