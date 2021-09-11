<?php
include('admin_header.php');
?>
<?php
include('constant.php');
include ('admin_login_check.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
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
        <a href="add_admin.php" class="btn-primary">Add admin</a>
        <br/><br/>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php

            foreach ($product->getData('admin') as $item):

            ?>
            <tr>
                <td> <?php echo $stt++  ?>.</td>
                <td> <?php echo $item['full_name']?></td>
                <td><?php echo $item['username']?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>change_password.php?id=<?php echo $item['admin_id']?>" class="btn-primary">Change Password</a>
                    <a href="<?php echo SITEURL; ?>update_admin.php?id=<?php echo $item['admin_id']?>" class="btn-second">Update Admin</a>
                    <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $item['admin_id']?>" class="btn-danger">Delete Admin</a>

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

