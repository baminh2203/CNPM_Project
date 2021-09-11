<?php
include('constant.php');
?>
<?php
$id =$_GET['id'];
$sql = "DELETE FROM product WHERE item_id=$id";
$res = mysqli_query($conn,$sql);
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Product Deleted Successfully</div>";
    header('location:'.SITEURL.'manage_product.php');
}
else
{
    $_SESSION['delete']="<div class='error'>Failed To Delete Product</div>";
    header('location:'.SITEURL.'manage_product.php');
}
?>