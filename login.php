<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
   <center>
    <div class="form-deg">
        <center class="title-deg">
            Login Form
            <h4>
                <?php
                error_reporting(0);
                session_start();
                echo $_SESSION['loginMessage']
                ?>
            </center>

    <form action="login_check.php" method="POST" class="login-form">
        <div>
            <label class="label-deg" for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
        </div>
        <div>
            <label class="label-deg" for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            </div>
            <div>
            <input class="btn btn-primary" type="submit" name="submit" value="Login">
            </div>
        </div>
    </form>
    </div>



   </center>
    
    
    
</body>
</html>