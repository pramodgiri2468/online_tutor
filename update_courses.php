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

$id = $_GET['course_id'];
$sql = "SELECT * FROM courses WHERE id='$id'";
$result = mysqli_query($conn, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $teacher_id = $_POST['teacher_id'];
    $subject_id = $_POST['subject_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $is_subject = isset($_POST['is_subject']) ? 1 : 0;

    $query = "UPDATE courses SET teacher_id='$teacher_id', subject_id='$subject_id', title='$title', description='$description', is_subject='$is_subject' WHERE id='$id'";

    $result2 = mysqli_query($conn, $query);

    if ($result2) {
        header("Location: view_courses.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>
</head>
<body>
   <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
        <h1>Update Course</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Teacher ID</label>
                    <input type="text" name="teacher_id" value="<?php echo $info['teacher_id']; ?>" required>
                </div>
                <div>
                    <label>Subject ID</label>
                    <input type="text" name="subject_id" value="<?php echo $info['subject_id']; ?>" required>
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $info['title']; ?>" required>
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="description" value="<?php echo $info['description']; ?>">
                </div>
                <div>
                    <label>Is Subject</label>
                    <input type="checkbox" name="is_subject" <?php echo $info['is_subject'] ? 'checked' : ''; ?>>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
        </div>
        </center>
    </div>

</body>
</html>
