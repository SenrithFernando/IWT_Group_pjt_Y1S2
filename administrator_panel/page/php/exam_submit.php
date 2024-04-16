<?php
include "../dbcon.php";





$name=mysqli_real_escape_String($conn,$_POST['name']);
$time=mysqli_real_escape_String($conn,$_POST['time']);




$checkNicQuery="SELECT * FROM exam WHERE name='$name';";
$getNic = mysqli_query($conn,$checkNicQuery);

if(mysqli_num_rows($getNic)>0){
    header("location:../examination.php?error=userhave");
}else{
    $studentInsetQuery="INSERT INTO `exam`( `name`, `time`) VALUES ('$name', '$time');";
    $insertResult = mysqli_query($conn,$studentInsetQuery);

    if($insertResult){
        header("location:../examination.php?done");
    }
}



