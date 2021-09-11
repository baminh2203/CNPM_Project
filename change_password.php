<?php
include('admin_header.php');
?>
<?php
include('constant.php');
?>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $cookie_name="id";
    $cookie_value = (string)($id);
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
        if(isset($_SESSION['not_match_password']))
        {
            echo $_SESSION['not_match_password'];
            unset($_SESSION['not_match_password']);
        }
        if(isset($_SESSION['user_not_found']))
        {
            echo $_SESSION['user_not_found'];
            unset($_SESSION['user_not_found']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    $sql="SELECT * FROM admin WHERE admin_id=$id AND password='$current_password'";

    $res= mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);
    if($count==1)
    {
        if($new_password==$confirm_password)
        {
            $sql2 = "UPDATE admin SET
                    password='$new_password'
                    WHERE admin_id=$id
                ";
            $res2=mysqli_query($conn,$sql2);
            if($res2==true)
            {
                $_SESSION['change_success']="<div class='success'>Change Password Successfully</div>";
                header('location:'.SITEURL.'manage_admin.php');
            }

        }
        else
        {
            $_SESSION['not_match_password'] = "<div class='error'> Password didn't match. </div>";
            header('location:'.SITEURL.'change_password.php?id='.$cookie_value);
        }
    }
    else
    {
        $_SESSION['user_not_found'] = "<div class='error'> Password isn't correct. </div>";
        header('location:'.SITEURL.'change_password.php?id='.$cookie_value);
    }
}
?>
<?php
include('footer.php');
?>

