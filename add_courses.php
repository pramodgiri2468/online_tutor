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

if (isset($_POST['add_course'])) {
    $teacher_id = $_POST['teacher_id'];
    $subject_id = $_POST['subject_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $is_subject = isset($_POST['is_subject']) ? 1 : 0; // Checkbox value

    // Validation (you can add more validation here as needed)
    if (empty($teacher_id) || empty($subject_id) || empty($title)) {
        echo "<script type='text/javascript'>
              alert('Please fill in all required fields.');
              </script>";
    } else {
        $sql = "INSERT INTO courses (teacher_id, subject_id, title, description, is_subject) VALUES ('$teacher_id', '$subject_id', '$title', '$description', '$is_subject')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
                  alert('Course Added Successfully');
                  </script>";
        } else {
            echo "<script type='text/javascript'>
                  alert('Failed to Add Course');
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
            <h1>Add Course</h1>

            <div class="div_deg">
                <form action="" method="POST">
                    <div>
                        <label>Teacher ID</label>
                        <input type="text" name="teacher_id" required>
                    </div>
                    <div>
                        <label>Subject ID</label>
                        <input type="text" name="subject_id" required>
                    </div>
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div>
                        <label>Description</label>
                        <input type="text" name="description">
                    </div>
                    <div>
                        <label>Is Subject</label>
                        <input type="checkbox" name="is_subject">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_course" value="Add Course">
                    </div>
                </form>
            </div>
        </center>
    </div>

</body>
</html>
