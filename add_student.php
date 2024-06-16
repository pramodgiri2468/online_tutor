<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if($_SESSION['is_teacher']=="0"){
    header("Location: login.php");
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
</head>
<body>
    
   <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h1>Add Student</h1>

        <div> 
            <form>
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
                    
                    <input type="submit" name="add_student" value="Add Student">
                </div>
            </form>
            

        </div>
        
</div>

</body>
</html>