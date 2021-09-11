<?php
include('constant.php');
?>
<?php
    $id =$_GET['id'];
    $sql = "DELETE FROM admin WHERE admin_id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'manage_admin.php');
    }
    else
    {
        $_SESSION['delete']="<div class='error'>Failed To Delete Admin</div>";
        header('location:'.SITEURL.'manage_admin.php');
    }
?>