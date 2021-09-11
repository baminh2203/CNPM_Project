<?php
include('admin_header.php');
?>
<?php
include('constant.php');
?>
<?php
if(isset($_POST['submit']))
{
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $sql="INSERT INTO admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
         ";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update']="<div class='success'>Admin Added Successfully</div>";
        header('location:'.SITEURL.'manage_admin.php');
    }
    else
    {
        $_SESSION['update']="<div class='error'>Failed To Add Admin</div>";
        header('location:'.SITEURL.'manage_admin.php');
    }
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" placeholder="Your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include('footer.php');
?>

