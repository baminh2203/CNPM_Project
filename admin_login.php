<?php
include('constant.php');
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Admin Login</h1>
            <br>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login']))
            {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
            ?>
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter username"> <br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter password">
                <br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login'] = "<div class='success'>Login Successfull.</div>";
        $_SESSION['admin'] = $username;
        header('location:'.SITEURL.'manage_admin.php');

    }
    else
    {
        $_SESSION['login']="<div class='error text-center'>Username or password did not match.</div>";
        header('location:'.SITEURL.'admin_login.php');
    }
}
?>