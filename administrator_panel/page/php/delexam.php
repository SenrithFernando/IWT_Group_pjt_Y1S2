<?php
// start the session
session_start();
include "../dbcon.php";

?>

<?php

if(isset($_GET['deleteid'])){
    $e_id=$_GET['deleteid'];
    $deletecareer="DELETE FROM `exam` WHERE `id`='$e_id'";
    
    
    $result=mysqli_query($conn,$deletecareer);
    if($result){
        header("Location:../examination.php?deleted");
    }
}
?>