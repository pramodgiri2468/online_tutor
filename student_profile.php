<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if(!$_SESSION['is_teacher']== 0){
    header("Location: login.php");
}

require_once 'config/db_connect.php';

$username=$_SESSION['username'];

$sql="SELECT * FROM users WHERE username='$username'";

$result=mysqli_query($conn,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="UPDATE users SET username='$username', email='$email', password='$password' WHERE username='$username'";

    $result2=mysqli_query($conn,$query);

    if($result2){
       header("Location: student_profile.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
   <?php include 'student_sidebar.php'; ?>

   <div class="content">
    <center>
        <h1>Update Profile</h1>
    <form action="#" method="POST">
        <div class="div_deg">
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo "{$info['username']}"?>">
        </div>

        <div>
            <label>email</label>
            <input type="text" name="username" value="<?php echo "{$info['email']}"?>">
            
        </div>

        <div>
            <label>password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
            
        </div>
        <div>
            
            <input type="submit" class="btn btn-primary" name="update_profile">
        </div>
    </div>
    </form>
    </center>
   </div>


    
        


</body>
</html>