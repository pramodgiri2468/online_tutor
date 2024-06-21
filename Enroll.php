<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('location: pageNotFound.php');
    exit;
}

// Include database connection
include 'config/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment</title>
    <style>
        .trainings-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .training-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
        }
        .training-card-title {
            margin: 0;
        }
        .training-card-body {
            margin-top: 10px;
        }
        .training-card-description {
            text-align: justify;
        }
        .training-card-enroll {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .training-card-enroll:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1 class="trainings-heading">Enrollment</h1>

<div class="trainings-container">
    <?php
    // Fetch courses from database
    $sql = "SELECT ID, title, teacher_id, subject_id, description FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display each course as a card
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="training-card">
                <div class="training-card-header">
                    <h3 class="training-card-title"><?php echo $row["title"]; ?></h3>
                </div>
                <div class="training-card-body">
                    <p>Teacher ID: <?php echo $row["teacher_id"]; ?></p>
                    <p>Subject ID: <?php echo $row["subject_id"]; ?></p>
                    <p class="training-card-description"><?php echo $row["description"]; ?></p>
                    <form method="post">
                        <input type="hidden" name="course_id" value="<?php echo $row['ID']; ?>">
                        <button class="training-card-enroll" type="submit" name="enroll">Enroll</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</div>

<div class="message">
    <?php
    // Process enrollment form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enroll'])) {
        include 'config/db_connect.php';  // Include database connection file

        $course_id = $_POST['course_id'];
        $username = $_SESSION['username'];  // Assuming 'username' holds the username

        // Fetch user_id based on username
        $user_id_sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($user_id_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_row = $result->fetch_assoc();
            $user_id = $user_row['id'];

            // Check if the user is already enrolled
            $check_sql = "SELECT * FROM enrollment WHERE student_id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result_check = $stmt->get_result();

            if ($result_check->num_rows > 0) {
                echo 'You are already enrolled in this course.';
            } else {
                // Enroll the user
                $insert_sql = "INSERT INTO enrollment (student_id, course_id) VALUES (?, ?)";
                $stmt = $conn->prepare($insert_sql);
                $stmt->bind_param("ii", $user_id, $course_id);

                if ($stmt->execute()) {
                    echo 'Congratulations, you are enrolled!';
                } else {
                    echo 'There was an error processing your request.';
                }
            }
        } else {
            echo 'User not found.';
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</div>

</body>
</html>
