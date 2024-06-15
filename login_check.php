<?php
session_start();

$host= "localhost";
$users= "root";
$password= "";
$db= "23189635.2";

$data=mysqli_connect($host,$users,$password,$db);

if($data==false){
    die("connection error ");
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0){
        if($row["is_teacher"]==1){
            
             $_SESSION['username']=$username;
             $_SESSION['is_teacher']="1";
            header("Location:adminhome.php");
        }
        else{
            $_SESSION['username']=$username;
            $_SESSION['is_teacher']="0";
            header("Location:studenthome.php");
        }
    }
    else{
        session_start();
        $message= "Invalid username or password";
        $_SESSION['loginMessage']=$message;

        header("Location:login.php");
    }

    
}
?>
