<?php
session_start();
require_once 'config/db_connect.php';

if($_GET['user_id'])
{
    $user_id=$_GET['user_id'];

    $sql="DELETE FROM users WHERE id='$user_id'";

    $result=mysqli_query($conn,$sql);

    if($result)
    {
        $SESSION['message']="User deleted successfully";
        header("location:view_users.php");
    }
}

?>