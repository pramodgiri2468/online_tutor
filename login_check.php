<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "23189635.2";

// Establishing connection to the database
$data = mysqli_connect($host, $user, $password, $dbname);

if ($data == false) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user with username
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($data, $sql);

    // Bind parameters and execute query
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            // Password correct, set session variables
            $_SESSION['username'] = $username;
            $_SESSION['is_teacher'] = $row['is_teacher'];

            // Redirect based on user type
            if ($row['is_teacher'] == 1) {
                header("Location: adminhome.php");
            } else {
                header("Location: studenthome.php");
            }
            exit;
        } else {
            // Incorrect password
            $_SESSION['loginMessage'] = "Invalid username or password";
            header("Location: login.php");
            exit;
        }
    } else {
        // No user found
        $_SESSION['loginMessage'] = "Invalid username or password";
        header("Location: login.php");
        exit;
    }
} else {
    // Invalid request method
    $_SESSION['loginMessage'] = "Invalid request method";
    header("Location: login.php");
    exit;
}
?>
