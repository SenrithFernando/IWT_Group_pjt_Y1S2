<?php
// start the session
session_start();
include "../dbcon.php";

?>

<?php

if(isset($_GET['deleteid'])){
    $e_id=$_GET['deleteid'];
    $deletecareer="DELETE FROM `exam` WHERE `id`='$e_id'";
    $deleteq="DELETE FROM `quiz` WHERE `e_id`='$e_id'";
    
    
    $result=mysqli_query($conn,$deletecareer);
    $result1=mysqli_query($conn,$deleteq);
    if($result){
        if ($result1) {
            header("Location:../examination.php?deleted");
        }
        
    }
}
?>