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
    <style>
        .form-deg {
            padding-top: 100px;
        }

        .label-deg {
            display: inline-block;
            color: skyblue;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .login-form {
            background-color: black;
            width: 100%;
            max-width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
            margin: 0 auto;
        }

        .title-deg {
            background-color: skyblue;
            color: white;
            text-align: center;
            font-weight: bold;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 20px;
        }

        @media (max-width: 630px) {
            .label-deg {
                width: 100%;
                text-align: center;
                padding-left: 10px;
            }

            .login-form {
                padding-top: 30px;
                padding-bottom: 30px;
                padding-left: 10px;
                padding-right: 10px;
            }

            .title-deg {
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
   <center>
    <div class="form-deg">
        <div class="title-deg">
            Login Form
            <h4>
                <?php
                error_reporting(0);
                session_start();
                echo $_SESSION['loginMessage']
                ?>
            </h4>
        </div>

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
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
   </center>
</body>
</html>
