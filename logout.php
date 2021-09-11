<?php
include('constant.php');
?>
<?php
session_destroy();
$sql = "DELETE FROM cart";
$res = mysqli_query($conn,$sql);
if($res==true)
{
    header('location:'.SITEURL.'index.php');
}

?>