<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if($_SESSION['is_teacher']=="0"){
    header("Location: login.php");
}

require_once 'config/db_connect.php';

$id=$_GET['user_id'];
 $sql="SELECT * FROM users WHERE id='$id'";
    $result=mysqli_query($conn,$sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update']))
    {
        $name=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $is_teacher=$_POST['is_teacher'];

        $query="UPDATE users SET username='$name',password='$password',email='$email',is_teacher='$is_teacher' WHERE id='$id'";

        $result2=mysqli_query($conn,$query);

        if($result2) {
            header("location:view_users.php");
        }
    }




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
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    .div_deg{
        background-color: skyblue;
        width: 400px;
        padding-bottom: 70px;
        padding-top: 70px;

    }
    
    </style>


</head>
<body>
   <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
        <h1>Update Users</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo "{$info['username']}"; ?>">
                </div>
                <div>
                    <label>password</label>
                    <input type="text"  name="password" value="<?php echo "{$info['password']}"; ?>">
                </div>
                <div>
                    <label>email</label>
                    <input type="email"  name="email" value="<?php echo "{$info['email']}"; ?>">
                </div>
                <div>
                    <label>is_teacher</label>
                    <input type="boolean"  name="is_teacher" value="<?php echo "{$info['is_teacher']}"; ?>">
                </div>
                <div>
                    
                    <input class="btn btn-success" type="submit"  name="update" value="Update">
                </div>
            </form>
        </div>
        </center>
        
</div>

</body>
</html>