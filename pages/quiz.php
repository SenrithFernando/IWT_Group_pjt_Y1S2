<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../css/quiz.css"> <!-- Link your CSS file -->
    <?php include "../library/head.php"; ?>
</head>
<body>
<div class="hed">
    <?php include "../library/nav.php"; ?>  
</div>

<div class="container">
    <h2>Quiz</h2>
    <div class="quiz">
        <?php
        // Check if exam ID is provided in the URL
        if (isset($_GET['exam_id'])) {
            $exam_id = $_GET['exam_id'];

            // Database connection
            include "../conn/dbcon.php"; 

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch questions for the selected exam
            $sql = "SELECT * FROM quiz WHERE e_id = $exam_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each question
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='question'>";
                    echo "<p>" . $row['quiz'] . "</p>";
                    echo "<ul>";
                    echo "<li><input type='radio' name='answer_" . $row['q_id'] . "' value='opt1'>" . $row['opt1'] . "</li>";
                    echo "<li><input type='radio' name='answer_" . $row['q_id'] . "' value='opt2'>" . $row['opt2'] . "</li>";
                    echo "<li><input type='radio' name='answer_" . $row['q_id'] . "' value='opt3'>" . $row['opt3'] . "</li>";
                    echo "<li><input type='radio' name='answer_" . $row['q_id'] . "' value='opt4'>" . $row['opt4'] . "</li>";
                    echo "</ul>";
                    echo "</div>";
                }
                echo "<button onclick='submitQuiz($exam_id)'>Submit Quiz</button>";
            } else {
                echo "No questions available for this exam";
            }

            mysqli_close($conn);
        } else {
            echo "Exam ID is not provided";
        }
        ?>
    </div>
</div>
<div class="fot">
    <?php include "../library/footer.php"; ?> 
</div>


<script>
    function submitQuiz(examId) {
        let score = 0;
        let totalQuestions = document.querySelectorAll('.question').length;

        // Loop through each question
        for (let i = 1; i <= totalQuestions; i++) {
            let selectedAnswer = document.querySelector('input[name="answer_' + i + '"]:checked');
            if (selectedAnswer) {
                // Check if the selected answer is correct
                if (selectedAnswer.value === 'opt1') {
                    score++;
                }
            }
        }

        // Redirect to the final score page with the exam ID and score
        window.location.href = 'final_score.php?exam_id=' + examId + '&score=' + score;
    }
</script>

</body>
</html>
