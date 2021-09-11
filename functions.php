<?php

require('database/DBController.php');
require('database/product.php');
require('database/Cart.php');
require('database/admin.php');

$db = new DBController();

$product = new Product($db);

$product_shuffle= $product->getData();

$cart = new Cart($db);

$admin = new admin($db);

