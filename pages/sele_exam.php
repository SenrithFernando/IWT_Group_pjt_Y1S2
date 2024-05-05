<?php
        // Database connection
        include "../conn/dbcon.php"; 

        ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Select</title>
    <link rel="stylesheet" href="../css/sele_exam.css"> <!-- Link your CSS file -->
    <?php include "../library/head.php"; ?>
</head>
<body>
<div class="hed">
    <?php include "../library/nav.php"; ?>  
</div>


<div class="container">
    <h2>Select an Exam</h2>
    <div class="exam-list">
        <?php

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch exams from the database
        $sql = "SELECT * FROM exam";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='exam-item'>";
                echo "<a href='quiz.php?exam_id=" . $row['id'] . "'>" . $row['name'] . "</a>";
                echo "</div>";
            }
        } else {
            echo "No exams available";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>


<div class="fot">
     <?php include "../library/footer.php"; ?> 
</div>

</body>
</html>
