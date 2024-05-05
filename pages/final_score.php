<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Score</title>
    <link rel="stylesheet" href="../css/final_score.css"> <!-- Link your CSS file -->
    <?php include "../library/head.php"; ?>
</head>
<body>

<div class="container">
    <h2>Final Score</h2>
    <?php
    // Check if exam ID and score are provided in the URL
    if (isset($_GET['exam_id']) && isset($_GET['score'])) {
        $exam_id = $_GET['exam_id'];
        $score = $_GET['score'];

        // Database connection
        include "../conn/dbcon.php"; 

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the score into the score table
        $sql = "INSERT INTO score (exam_id, score) VALUES ('$exam_id', '$score')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Your score for Exam ID: $exam_id is $score out of total questions.</p>";
            ?><a href="home.php" class="ins_edit_buttons">Ok</a><?php
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Exam ID or score is not provided.";
    }
    ?>
</div>

</body>
</html>
