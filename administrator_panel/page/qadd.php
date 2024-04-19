<?php
include "dbcon.php";

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}



$useruid = $_SESSION['useruid'];

$e_id = $_SESSION['e_id'];


if ($_GET['qeeid']==null) {
    header('Location: examination.php');
    exit();
}

if(isset($_GET['qeeid'])){
    $e_id=$_GET['qeeid'];

    

    $_SESSION['e_id']=$e_id;
   
    $searchQ="SELECT * FROM `exam` WHERE `id`='$e_id'";
                        
    $result=mysqli_query($conn,$searchQ);

    if($result){
    // echo "Select Ok";
    }?>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    $e_id=$row['id'];
    $name=$row['name'];

    
}

}




if (isset($_SESSION['e_id'])) {
    $e_id = $_SESSION['e_id'];
    if ($e_id!=0) {
        $_SESSION['e_id']=$e_id;

        $searchQ="SELECT * FROM `exam` WHERE `id`='$e_id'";
                        
        $result=mysqli_query($conn,$searchQ);
    
        if($result){
        // echo "Select Ok";
        }?>
        <?php
        while($row=mysqli_fetch_assoc($result)){
        $e_id=$row['id'];
        $name=$row['name'];
    }}
    else {
        header('Location: examination.php?err_inisset_eid');
        exit();
    }

    

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q Add</title>
    <link rel="stylesheet" href="style.css">
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
                        <h2>Enter Quiz Information for <?php echo $name ?></h2>
                        <form action="php/q_insert.php" method="post">
                            <label for="name">Quiz :</label>
                            <input type="text" id="quiz" name="quiz" required>

                            <label for="time">Add Option 1</label>
                            <input type="text" id="opt1" name="opt1" required>

                            <label for="time">Add Option 2</label>
                            <input type="text" id="opt2" name="opt2" required>

                            <label for="time">Add Option 3</label>
                            <input type="text" id="opt3" name="opt3" required>

                            <label for="time">Add Option 4</label>
                            <input type="text" id="opt4" name="opt4" required>

                            <label for="time">Answer</label>
                            <input type="text" id="answer" name="answer" required>

                            <button type="submit">Submit</button>
                            
                        </form>
                        <?php
                                
                            if (isset($_GET['doneq'])) {
                            
                                echo '<span id="er_msg" style="color: green;">quiz added successfully!</span>';
                            } elseif (isset($_GET['error']) && $_GET['error'] === 'userhave') {
                                
                                echo '<span id="er_msg" style="color: red;">Record already exists in the exam list!</span>';
                            } elseif (isset($_GET['deleted'])) {
                            
                                echo '<span id="er_msg" style="color: blue;">Record deleted successfully!</span>';
                            } elseif (isset($_GET['doneup'])) {
                                
                                echo '<span id="er_msg" style="color: blue;">Record updated successfully!</span>';
                            } 

                        ?>


                        <!-- <span id="er_msg">..A</span> -->
                        
                    </div>

                   
                </div>

            </div>
        </div>
    </body>

</html>