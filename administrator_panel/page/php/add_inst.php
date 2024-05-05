<?php
include "../dbcon.php"; 


session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}
$useruid = $_SESSION['useruid'];


 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $exam_title = $_POST['exam_title'];
    $instructions = $_POST['instructions'];
    
    // Prepare and execute SQL statement to insert instruction into the table
    $sql = "INSERT INTO instruction (examid, instructions) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $exam_title, $instructions);
    
    // Check if the insertion was successful
    if (mysqli_stmt_execute($stmt)) {
        echo "Instruction added successfully.";
        header("Location:../instrucview.php?added");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
