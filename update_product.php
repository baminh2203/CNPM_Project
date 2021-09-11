<?php
include('admin_header.php');
?>
<?php
include('constant.php');
?>
<?php
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = ($_POST['item_image']);
    $item_type = $_POST['item_type'];

    $sql = "UPDATE product SET 
    item_name='$item_name',
    item_price='$item_price',
    item_image='$item_image',
    item_type='$item_type'
    WHERE item_id = $id
    ";

    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update']="<div class='success'>Product Update Successfully</div>";
        header('location:'.SITEURL.'manage_product.php');
    }
    else
    {
        $_SESSION['update']="<div class='error'>Failed To Update Product</div>";
        header('location:'.SITEURL.'manage_product.php');
    }
}
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Product</h1>
            <br><br>

            <?php
            $id = $_GET['id'];

            $sql="SELECT * FROM product WHERE item_id=$id";

            $res=mysqli_query($conn,$sql);

            if($res==true)
            {
                $count=mysqli_num_rows($res);
                if($count==1){
                    $row=mysqli_fetch_assoc($res);

                    $item_name =$row['item_name'];
                    $item_price = $row['item_price'];
                    $item_image = $row['item_image'];
                    $item_type = $row['item_type'];
                }
                else
                {
                    header('location:'.SITEURL.'manage_admin.php');
                }
            }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Product name: </td>
                        <td>
                            <input type="text" name="item_name" value="<?php echo $item_name?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="text" name="item_price" value="<?php echo $item_price?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Link image: </td>
                        <td>
                            <input type="text" name="item_image" value="<?php echo $item_image?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Product type: </td>
                        <td>
                            <input type="text" name="item_type" value="<?php echo $item_type?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="submit" name="submit" value="Update Product " class="btn-second">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


<?php
include('footer.php');
?>