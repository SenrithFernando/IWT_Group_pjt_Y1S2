<?php
include "dbcon.php";

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}


$useruid = $_SESSION['useruid'];



if(isset($_GET['updateid'])){
    $e_id=$_GET['updateid'];
   
    $searchQ="SELECT * FROM `exam` WHERE `id`='$e_id'";
                        
    $result=mysqli_query($conn,$searchQ);

    if($result){
    // echo "Select Ok";
    }?>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    $e_id=$row['id'];
    $name=$row['name'];
    $time=$row['time'];
}

}

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
                <h2>Examination</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            <div class="t-container">
                <div class="t-form">
                    <h2>Update Exam Information</h2>
                    <form action="php/exam_update.php" method="post">
                        <label for="name">New Exam Category :</label>
                        <input type="text" id="name" name="name" value="<?php echo $name ?>" required>

                        <label for="time">Exam Time (min) :</label>
                        <input type="text" id="time" name="time" value="<?php echo $time ?>" required>

                        <input type="text" id="id" name="id" hidden value="<?php echo $e_id ?>" required>

                        <button type="submit">Update</button>
                        
                    </form>
                    <?php
                            
                        if (isset($_GET['done'])) {
                            
                            echo '<span id="er_msg" style="color: green;">Record updated successfully!</span>';
                        } elseif (isset($_GET['error']) && $_GET['error'] === 'userhave') {
                            
                            echo '<span id="er_msg" style="color: red;">Record already exists in the exam list!</span>';
                        } elseif (isset($_GET['deleted'])) {
                            
                            echo '<span id="er_msg" style="color: blue;">Record deleted successfully!</span>';
                        } 

                    ?>


                    <!-- <span id="er_msg">..A</span> -->
                    
                </div>

              
            </div>

        </div>
    </div>
</body>

</html>