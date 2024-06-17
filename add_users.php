<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if($_SESSION['is_teacher']=="0"){
    header("Location: login.php");
}

require_once 'config/db_connect.php';

if(isset($_POST['add_student']))
{
    $username=$_POST['username'];
    $user_password=$_POST['password'];
    $user_email=$_POST['email'];
    $teacher_bool=$_POST['is_teacher'];

    $check="SELECT * FROM users WHERE username='$username'";
    $check_user=mysqli_query($conn,$check);
    $row_count=mysqli_num_rows($check_user);

    if($row_count==1)
    {
        echo " <script type='text/javascript'>
        alert('Username Already Exist. Try Another One');
        </script";
    }

    else{


    $sql="INSERT INTO users(username,password,email,is_teacher) VALUES('$username','$user_password','$user_email','$teacher_bool')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo " <script type='text/javascript'>
        alert('Data Uploaded Successfully');
        </script";


    }
    
    
    else{
        echo "Upload Failed";
    }
}
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;

        }
    </style>
    <link rel="stylesheet" href="css/admin.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    
   <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
        <h1>Add Users</h1>

        <div class="div_deg"> 
            <form action="" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label>password</label>
                    <input type="text" name="password" required>
                </div>
                <div>
                    <label>email</label>
                    <input type="text" name="email" required>
                </div>
                <div>
                    <label>is_teacher</label>
                    <input type="boolean" name="is_teacher" required>
                </div>

                <div>
                    
                    <input type="submit" class="btn btn-primary" name="add_users" value="Add Users">
                </div>
            </form>
            

        </div>
    </center>
        
</div>

</body>
</html>