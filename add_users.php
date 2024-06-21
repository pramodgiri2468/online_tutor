<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION['is_teacher'] == "0") {
    header("Location: login.php");
    exit();
}

require_once 'config/db_connect.php';

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $is_teacher = isset($_POST['is_teacher']) ? 1 : 0; // Checkbox value

    // Check if the username already exists
    $check = "SELECT * FROM users WHERE username='$username'";
    $check_user = mysqli_query($conn, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
              alert('Username Already Exists. Try Another One');
              </script>";
    } else {
        $sql = "INSERT INTO users (username, password, email, is_teacher) VALUES ('$username', '$password', '$email', '$is_teacher')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
                  alert('User Added Successfully');
                  </script>";
        } else {
            echo "<script type='text/javascript'>
                  alert('Failed to Add User');
                  </script>";
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
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
            margin-top: 100px;
        }

            /* Media queries for responsive layout */
@media (max-width: 768px) {
    .div_deg {
        width: 90%; /* Adjust width to occupy 90% of the viewport */
        max-width: 400px; /* Limit maximum width for readability */
        padding: 30px; /* Add more padding for better spacing */
    }

    label {
        width: 80px; /* Reduce label width for smaller screens */
    }
}

@media (max-width: 480px) {
    .div_deg {
        padding-top: 50px; /* Adjust padding for smaller screens */
        padding-bottom: 50px;
    }

    label {
        width: 70px; /* Further reduce label width */
    }
        }
    </style>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h1>Add User</h1>

            <div class="div_deg">
                <form action="" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>Is Teacher</label>
                        <input type="checkbox" name="is_teacher">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
                    </div>
                </form>
            </div>
        </center>
    </div>

</body>
</html>
