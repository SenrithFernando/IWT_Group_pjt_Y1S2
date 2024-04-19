<?php
include "../dbcon.php";

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}



$useruid = $_SESSION['useruid'];

$e_id =  $_SESSION['e_id'];



    if ($e_id!=0) {
       

        $searchQ="SELECT * FROM `exam` WHERE `id`='$e_id'";
                        
        $result=mysqli_query($conn,$searchQ);
    
        if($result){
        echo "Select Ok";
        }?>
        <?php
        while($row=mysqli_fetch_assoc($result)){
        $e_id=$row['id'];
        $name=$row['name'];
    }}
    else {
        // header('Location: examination.php');
        exit();
    }

    

echo $e_id;







$quiz = mysqli_real_escape_string($conn, $_POST['quiz']);
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);






    $studentInsetQuery="INSERT INTO `quiz`(`e_id`, `quiz`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES ('$e_id','$quiz','$opt1','$opt2','$opt3','$opt4','$answer');";
    $insertResult = mysqli_query($conn,$studentInsetQuery);

    if($insertResult){
        $_SESSION['e_id']=$e_id;
        header("location:../qadd.php?doneq");
    }

