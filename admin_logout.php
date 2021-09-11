<?php
include('constant.php');
?>
<?php
    session_destroy();

    header('location:'.SITEURL.'admin_login.php');
?>