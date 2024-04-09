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
            <div class="container_btn">
                
                    <div class="bttn">
                        <button class="button" onclick="check('emp')">Employee</button>
                        <button class="button">Engenering Faculty</button>
                    </div>
                    <div class="bttn">
                        <button class="button">IT Faculty</button>
                        <button class="button">Engenering Faculty</button>
                    </div>
                
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Select Type : </p>
                    <button id="okBtn" class="button1">Intern</button>
                    <button id="cancelBtn" class="button1">Permenet</button>
                    <button id="closeBtn" class="button1">Close</button>
                </div>
            </div>
            

        </div>
    </div>

    <!-- External JavaScript file -->
<script src="js.js"></script>

</body>

</html>