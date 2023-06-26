<?php
require('dbconnect.php');
$result = $conn->query("SELECT * FROM products");
require('components/header.php');
require('components/products_list.php');
require('components/footer.php');
?>