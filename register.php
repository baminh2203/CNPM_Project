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
    $sql1 = "SELECT * FROM user WHERE username='$username'";
    $res1 = mysqli_query($conn,$sql1);
    if($full_name != "" and $username != "" and $password != "" ) {
        if (mysqli_num_rows($res1) == 0) {
            $sql = "INSERT INTO user SET
            full_name='$full_name',
            username='$username',
            password='$password'
         ";
            $res = mysqli_query($conn, $sql);
            if ($full_name != "" and $username != "" and $password != "" and $res == true) {
                $_SESSION['update'] = "<div class='success'>Your account has been created</div>";
                header('location:' . SITEURL . 'login.php');
            } else {
                $_SESSION['update'] = "<div class='error'>Failed To Create New Account</div>";
                header('location:' . SITEURL . 'login.php');
            }
        } else {
            $_SESSION['update'] = "<div class='error'>Failed To Create New Account</div>";
            header('location:' . SITEURL . 'login.php');
        }
    }
    else {
        $_SESSION['update'] = "<div class='error'>Failed To Create New Account</div>";
        header('location:' . SITEURL . 'login.php');}
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Create Your Acount</h1>
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
                        <input type="submit" name="submit" value="OK" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include('footer.php');
?>

