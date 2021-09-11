<?php
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login'] ="<div class='error'>Please login to access user panel. </div>";
    header('location:'.SITEURL.'login.php');
}

?>