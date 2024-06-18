<?php
session_start();
require_once 'config/db_connect.php';

if ($_GET['course_id']) {
    $course_id = $_GET['course_id'];

    $sql = "DELETE FROM courses WHERE id='$course_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Course deleted successfully";
        header("Location: view_courses.php");
    } else {
        $_SESSION['message'] = "Failed to delete course";
        header("Location: view_courses.php");
    }
}
?>
