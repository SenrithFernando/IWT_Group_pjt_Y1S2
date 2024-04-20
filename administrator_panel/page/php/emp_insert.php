<?php
include "../dbcon.php"; 


session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}



$useruid = $_SESSION['useruid'];


$name = mysqli_real_escape_string($conn, $_POST['name']);
$nic = mysqli_real_escape_string($conn, $_POST['nic']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$gender = mysqli_real_escape_string($conn, $_POST['sex']); 
$type = mysqli_real_escape_string($conn, $_POST['type']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);





$checkNicQuery="SELECT * FROM employee WHERE name='$name'";
$getNic = mysqli_query($conn,$checkNicQuery);

if(mysqli_num_rows($getNic)>0){
    header("location:../employee_reg_form.php?userhave");
}else{
    $insertQuery = "INSERT INTO `employee` (`name`, `nic`, `address`, `telephone`, `gender`, `type`, `email`, `password`) 
                VALUES ( '$name', '$nic', '$address', '$telephone', '$gender', '$type', '$email', '$password')";

    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {

        header("location: ../employee_reg_form.php?done");
        exit; 
    } else {
        header("location: ../employee_reg_form.php?error");
        echo "Error: " . mysqli_error($conn); 
    }
    
    mysqli_close($conn);
}











?>
