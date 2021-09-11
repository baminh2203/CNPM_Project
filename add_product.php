<?php
include('admin_header.php');
?>
<?php
include('constant.php');
?>
<?php
if(isset($_POST['submit']))
{
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = ($_POST['item_image']);
    $item_type = $_POST['item_type'];
    $sql="INSERT INTO product SET
            item_name='$item_name',
            item_price='$item_price',
            item_image='$item_image',
            item_type='$item_type'
         ";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update']="<div class='success'>Product Added Successfully</div>";
        header('location:'.SITEURL.'manage_product.php');
    }
    else
    {
        $_SESSION['update']="<div class='error'>Failed To Add Product</div>";
        header('location:'.SITEURL.'manage_product.php');
    }
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="item_name" placeholder="Enter product name"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="item_price" placeholder="Price"></td>
                </tr>
                <tr>
                    <td>Link image</td>
                    <td><input type="text" name="item_image" placeholder="Link image here"></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><input type="text" name="item_type" placeholder="Tea or Coffee"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add product" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include('footer.php');
?>

