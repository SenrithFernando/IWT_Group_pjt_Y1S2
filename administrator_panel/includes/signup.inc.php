<?php

if (isset($_POST["submit"])) {
    
    // Grabbing Data 
    $uid = $_POST["newUsername"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email =$_POST["email"];

    // Instantiate signupContr
    echo "Instantiate signupContr";
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // Running error handlers and user signup
    echo "Running error handlers and user signup"; 
    $signup->signupUser();

    // Going to back to front page 
    header("location: ../login.php?error=none");

}


?>