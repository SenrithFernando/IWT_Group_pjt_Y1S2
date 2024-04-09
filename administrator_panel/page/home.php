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
            <h2>Welcome, Admin!</h2><a href="../includes/logout.inc.php">Logout</a>
            <p>This is the main content area of your admin panel.</p>
            <iframe width="100%" height="500Vh" src="https://www.gallelaptop.lk/" frameborder="1"></iframe>
        </div>
    </div>
</body>

</html>