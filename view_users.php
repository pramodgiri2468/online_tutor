<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if($_SESSION['is_teacher']=="0"){
    header("Location: login.php");
}

require_once 'config/db_connect.php';

$sql="SELECT * FROM users";

$result=mysqli_query($conn,$sql);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
    .table_th{
        padding: 20px;
        font-size: 20px;

    }

    .table_td{
        padding: 20px;
        background-color: skyblue;
    }
    
</style>
</head>
<body>
   <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
        <h1>Users Data</h1>
        <?php 
        if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            
        }
        unset($_SESSION['message']);

        ?>
        <br>
        <table border="1px">
            <tr>
                <th class="table_th">username</th>
                <th class="table_th">password</th>
                <th class="table_th">email</th>
                <th class="table_th">is_teacher</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php 
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>

            <td class="table_td">
                <?php 
                echo "{$info['username']}";
                ?>
            </td>
            <td class="table_td">
            <?php 
                echo "{$info['password']}";
                ?>
            </td>
            <td class="table_td">
            <?php 
                echo "{$info['email']}";
                ?>
            </td>
            <td class="table_td">
            <?php 
                echo "{$info['is_teacher']}";
                ?>
            </td>

            <td class="table_td">
            <?php 
                echo "<a onClick=\"javascript:return confirm('Are You Sure to Delete.');\" class='btn btn-danger' href='delete.php?user_id={$info['id']}'>Delete</a>";
                ?>
            </td>

            <td class="table_td">
            <?php 
                echo "<a class= 'btn btn-primary' href='update_users.php?user_id={$info['id']}'>Update</a>";
                ?>
            </td>
            </tr>
            <?php
            }
            ?>
                
        </table>
        </center>
        
</div>

</body>
</html>