<?php
include('admin_header.php');
?>
<?php
include('constant.php');
include ('admin_login_check.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>
        <br/>

        <?php
        $stt=1;
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['change_success']))
        {
            echo $_SESSION['change_success'];
            unset($_SESSION['change_success']);
        }
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        ?>
        <br/><br/>
        <a href="add_product.php" class="btn-primary">Add Product</a>
        <br/><br/>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            <?php

            foreach ($product->getData('product') as $item):

                ?>
                <tr>
                    <td> <?php echo $stt++?>.</td>
                    <td> <?php echo $item['item_name']?></td>
                    <td><?php echo $item['item_price']?></td>
                    <td><?php echo $item['item_image']?></td>
                    <td><?php echo $item['item_type']?></td>
                    <td>

                        <a href="<?php echo SITEURL; ?>update_product.php?id=<?php echo $item['item_id']?>" class="btn-second">Update Product</a>
                        <a href="<?php echo SITEURL; ?>delete_product.php?id=<?php echo $item['item_id']?>" class="btn-danger">Delete Product</a>

                    </td>
                </tr>
            <?php

            endforeach;
            ?>

        </table>
    </div>
</div>
<?php
include('footer.php');
?>

