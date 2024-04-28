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
            <div class="dash_hed">
            <h2>Welcome, Admin!</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            

        <div class="dash_row">
            <div class="dash_card">
                <h2 class="dash_title">Employee</h2>
                <p class="dash_description">This is the description for Card 1.</p>
                <img src="image1.jpg" alt="Image 1" class="dash_image">
            </div>
            <div class="dash_card">
                <h2 class="dash_title">Examination</h2>
                <p class="dash_description">This is the description for Card 2.</p>
                <img src="image2.jpg" alt="Image 2" class="dash_image">
            </div>
            <div class="dash_card">
                <h2 class="dash_title">Tickets</h2>
                <p class="dash_description">This is the description for Card 3.</p>
                <img src="image3.jpg" alt="Image 3" class="dash_image">
            </div>
            <div class="dash_card">
                <h2 class="dash_title">Maessages</h2>
                <p class="dash_description">This is the description for Card 4.</p>
                <img src="image4.jpg" alt="Image 4" class="dash_image">
            </div>
        </div>





            <!-- <p>This is the main content area of your admin panel.</p>
            <iframe width="100%" height="500Vh" src="https://www.gallelaptop.lk/" frameborder="1"></iframe>
         -->
    </div>
</body>

</html>