<?php
if(!isset($_SESSION['admin']))
{
    $_SESSION['no-login'] ="<div class='error'>Please login to access Admin Panel. </div>";
    header('location:'.SITEURL.'admin_login.php');
}

?>