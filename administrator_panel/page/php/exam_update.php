<?php
include "../dbcon.php";

// Retrieve data from POST request
$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$time = mysqli_real_escape_string($conn, $_POST['time']);

// Construct the SQL UPDATE query
$studentInsertQuery = "UPDATE `exam` SET `name`='$name', `time`='$time' WHERE `id`='$id'";

// Execute the SQL query
$insertResult = mysqli_query($conn, $studentInsertQuery);

// Check if the query was successful
if ($insertResult) {
    // Redirect with success message
    header("location:../examination.php?doneup");
} else {
    // Redirect with error message
    header("location:../examination.php?error=notup");
}
?>
