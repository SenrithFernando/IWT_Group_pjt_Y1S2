<?php
include "../dbcon.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get data for variables
    $updateid = $_POST['updateid'];
    $exam_title = $_POST['exam_title'];
    $instructions = $_POST['instructions'];

    // create update query
    $sql = "UPDATE instruction SET examid=?, instructions=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $exam_title, $instructions, $updateid);

    // check updated or not 
    if (mysqli_stmt_execute($stmt)) {
        echo "Instruction updated successfully.";
        header('Location: ../instrucview.php');
    } else {
        echo "Error updating instruction: " . mysqli_error($conn);
    }

  
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {

    header('Location: error.php');
    exit();
}
?>
