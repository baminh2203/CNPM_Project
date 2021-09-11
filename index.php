<?php
    ob_start();
    include('header.php');
?>

<?php
if(isset($_SESSION['submit']))
{
    echo $_SESSION['submit'];
    unset($_SESSION['submit']);

}
if(isset($_SESSION['logout']))
{
    echo $_SESSION['logout'];
    unset($_SESSION['logout']);

}
if(isset($_SESSION['login']))
{
    echo $_SESSION['login'];
    unset($_SESSION['login']);

}
include('template/_index.php');
?>
<?php
    include('footer.php');
?>