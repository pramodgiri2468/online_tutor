<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else if($_SESSION['is_teacher']=="1"){
    header("Location: login.php");
}





?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to Student Dashboard</h1>
    <a href="logout.php">Logout</a>
</body>
</html>