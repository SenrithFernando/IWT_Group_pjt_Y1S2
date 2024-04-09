<?php

if (isset($_POST["submit"])) {
    
    // Grabbing Data 
    $uid = $_POST["username"];
    $pwd = $_POST["pwd"];


    // Instantiate signupContr
    echo "Instantiate signupContr";
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and user signup
    echo "Running error handlers and user signup"; 
    $login->loginUser();

    // Going to back to front page 
    header("location: ../page/home.php?error=none");

}


?>