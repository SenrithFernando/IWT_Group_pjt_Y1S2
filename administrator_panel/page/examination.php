<?php
include "dbcon.php";

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}


$useruid = $_SESSION['useruid'];






?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
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
            <?php include "library/sidenav.php"; ?>
        </div>
        <div class="main-content">
            <div class="hed">
                <h2>Examination</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            <div class="t-container">
                <div class="t-form">
                    <h2>Enter Exam Information</h2>
                    <form action="php/exam_submit.php" method="post">
                        <label for="name">New Exam Category :</label>
                        <input type="text" id="name" name="name" required>

                        <label for="time">Exam Time (min) :</label>
                        <input type="text" id="time" name="time" required>

                        <button type="submit">Submit</button>
                        
                    </form>
                    <?php
                            
                        if (isset($_GET['done'])) {
                           
                            echo '<span id="er_msg" style="color: green;">Record added successfully!</span>';
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

                <div class="t-table">
                    <h2>Exam Details</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Time</th>
                                <th>Re arranges</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <?php
                            $searchQ="SELECT * FROM `exam`";
                        
                            $result=mysqli_query($conn,$searchQ);
                        
                            if($result){
                            // echo "Select Ok";
                            }?>
                            <?php
                            while($row=mysqli_fetch_assoc($result)){
                            $e_id=$row['id'];
                            $name=$row['name'];
                            $time=$row['time'];
                            
                            
                            ?>
                            <tr>
                            <td scope="row"><?php echo $name ?></td>
                            <td><?php echo $time ?></td>
                            
                            <td><button class="edi_bttn" id="update"><a id="a_exambttn" href="upexam.php? updateid=<?php echo $e_id ?>">Update</button></a>
                            <button class="del_bttn" id="delete"><a id="a_exambttn" href="php/delexam.php? deleteid=<?php echo $e_id; ?>">Delete</button></a>
                            <button class="qadd_bttn" id="module"><a id="a_exambttn" href="qadd.php? qeeid=<?php echo $e_id; ?>">Q Add</button></a>
                            </td>
                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>