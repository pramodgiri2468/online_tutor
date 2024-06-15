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
    <link rel="stylesheet" href="css/admin.css>
</head>
<body>
    <header class="">
        <a href="">Admin Dashboard</a>
</header>

</body>
</html>