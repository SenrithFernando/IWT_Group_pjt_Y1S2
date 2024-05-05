<?php
// start the session
session_start();
include "../dbcon.php";

?>

<?php

if(isset($_GET['deleteid'])){
    $e_id=$_GET['deleteid'];
    echo $e_id;
    $deletecareer="DELETE FROM `instruction` WHERE `id`='$e_id'";
    // $deleteq="DELETE FROM `quiz` WHERE `e_id`='$e_id'";
    
    
    $result=mysqli_query($conn,$deletecareer);
    // $result1=mysqli_query($conn,$deletecareer);
    if($result){
        header("Location:../instrucview.php?deleted");

        // if ($result1) {
            
        // }
        
    }
}
?>