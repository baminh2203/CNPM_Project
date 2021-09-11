<?php
    session_start();
    define('SITEURL','http://localhost:81/coffee_shop/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_password','');
    define('DB_NAME','shop');
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_password) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME)or die(mysqli_error());

?>