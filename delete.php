<?php
require_once 'config/db_connect.php';

if($_GET['user_id'])
{
    $user_id=$_GET['user_id'];

    $sql="DELETE FROM users WHERE id='user_id'";

    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header("location:view_users.php");
    }
}

?>