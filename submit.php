<?php
include('constant.php');
?>
<?php
$sql = "DELETE FROM cart";
$res = mysqli_query($conn,$sql);
if($res==true)
{
    $_SESSION['submit']="<div class='success'>Order successfully. Thank you</div>";
    header('location:'.SITEURL.'index.php');
}

?>