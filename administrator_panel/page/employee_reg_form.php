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
        input[type="password"].erg_valid {
            border: 1px solid green;
        }
        input[type="password"].erg_invalid {
            border: 1px solid red;
        }
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
                <h2>Employee Registration</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            <div class="button_newc">
               
            </div>

            
            <form action="php/emp_insert.php" method="post" class="emreg_form">
                <!-- <h2 class="emreg_heading"></h2> -->
                <!-- <label for="empid" class="emreg_label">Employee ID:</label>
                <input type="text" id="empid" name="empid" required class="emreg_input"> -->

                <label for="name" class="emreg_label">Name:</label>
                <input type="text" id="name" name="name" required class="emreg_input">

                <label for="nic" class="emreg_label">NIC:</label>
                <input type="text" id="nic" name="nic" required class="emreg_input">

                <label for="address" class="emreg_label">Address:</label>
                <input type="text" id="address" name="address" required class="emreg_input">

                <label for="telephone" class="emreg_label">Telephone:</label>
                <input type="text" id="telephone" name="telephone" required class="emreg_input">

                <label for="sex" class="emreg_label">Gender:</label>
                <select id="sex" name="sex" required class="emreg_select">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label for="type" class="emreg_label">Employee Type:</label>
                <select id="type" name="type" required class="emreg_select">
                    <option value="intern">Intern Employee</option>
                    <option value="permanent">Permanent Employee</option>
                    <option value="invigilator">Invigilator</option>
                    <option value="executive">Senior Executive</option>
                    <option value="assistant">Application Assistant</option>
                </select>

                <label for="email" class="emreg_label">Email:</label>
                <input type="email" id="email" name="email" required class="emreg_input">

                <label for="password" class="emreg_label">Password:</label>
                <input type="password" id="password" name="password" required minlength="5" 
                    oninput="checkPasswordLength(this)" placeholder="Minimum 5 characters" class="emreg_input">

                <button type="submit" class="emreg_button">Register</button>

                <?php
                            
                        if (isset($_GET['done'])) {
                           
                            echo '<span id="er_msg" style="color: green;">Record added successfully!</span>';
                        } elseif (isset($_GET['error']) ) {
                            
                            echo '<span id="er_msg" style="color: red;">Record not added</span>';
                        } elseif (isset($_GET['userhave'])) {
                           
                            echo '<span id="er_msg" style="color: red;">Record already added - try another !</span>';
                        }
                    ?>

            </form>



        </div>
    </div>

    <!-- External JavaScript file -->
<script>
    function checkPasswordLength(input) {
        if (input.value.length >= 5) {
            input.classList.remove("erg_invalid");
            input.classList.add("erg_valid");
        } else {
            input.classList.remove("erg_valid");
            input.classList.add("erg_invalid");
        }
    }
</script>

</body>

</html>