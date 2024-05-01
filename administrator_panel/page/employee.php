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
                <h2>Employee</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            <div class="button_newc">
                <button class="button_new"><a href="employee_reg_form.php"> Add New</button></a>
            </div>

            
            <div class="container_btn">
                
                    <div class="bttn">
                        <button class="button" onclick="check('emp')">Employee</button>
                        <button class="button"id="Senior_Execetiveid"><a id="a_exambttn" href="invigilator.php? invigilatorid=executive">Senior Execetive</button></a>
                    </div>
                    <div class="bttn">
                        <button class="button" id="Invigilatorid"><a id="a_exambttn" href="invigilator.php? invigilatorid=invigilator">Invigilator</button></a>
                        <button class="button">Application Assistant</button>
                    </div>
                
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Select Type : </p>
                    <button class="button1" id="okBtn"><a id="a_exambttn" href="invigilator.php? invigilatorid=intern">Intern</button></a>
                    <button class="button1" id="cancelBtn"><a id="a_exambttn" href="invigilator.php? invigilatorid=permenent">Permenent</button></a>
                    
                    <button id="closeBtn" class="button1">Close</button>
                </div>
            </div>
            

        </div>
    </div>

    <!-- External JavaScript file -->
<script src="js.js"></script>

</body>

</html>