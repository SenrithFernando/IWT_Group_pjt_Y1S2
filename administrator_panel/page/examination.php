<?php

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}


$useruid = $_SESSION['useruid'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="img">
                <img src="resolved.png" alt="">
            </div>
            <h2>Administrator Panel</h2>
            <?php include "sidenav.php"; ?>
        </div>
        <div class="main-content">
            <div class="hed">
                <h2>Examination</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            <div class="bttn_exam">
                <button class="button_exam">IT Faculty</button>
                <button class="button_exam">Engenering Faculty</button>
                <button class="button_exam">Bussiness Faculty</button>
                <button class="button_exam">Invigilator</button>

            </div>

        </div>
    </div>
</body>

</html>