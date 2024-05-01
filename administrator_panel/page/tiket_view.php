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
    <title>Tikets</title>
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
                <h2>Employee</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>

            <div class="t-table">
                    <h2>Tikets</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Emp id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Re arranges</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <?php
                            $searchQ="SELECT * FROM `ticket`";
                        
                            $result=mysqli_query($conn,$searchQ);
                        
                            if($result){
                            // echo "Select Ok";
                            }?>
                            <?php
                            while($row=mysqli_fetch_assoc($result)){

                                

                                $tk_id=$row['tk_id'];
                                $e_id=$row['emp_id'];
                                $title=$row['title'];
                                $desc=$row['description'];
                                $date=$row['date'];
                                $email=$row['email'];
                                
                            
                            
                            
                            ?>
                            <tr>
                            <td scope="row"><?php echo $e_id ?></td>
                            <td><?php echo $title ?></td>
                            <td><?php echo $desc ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $email ?></td>
                            
                            <td><button class="edi_bttn" id="update"><a id="a_exambttn" href="upexam.php? updateid=<?php echo $e_id ?>">Edit</button></a>
                            <button class="del_bttn" id="delete"><a id="a_exambttn" href="php/delexam.php? deleteid=<?php echo $e_id; ?>">Delete</button></a>
                            <button class="qadd_bttn" id="module"><a id="a_exambttn" href="qadd.php? qeeid=<?php echo $e_id; ?>">Exam Assign</button></a>
                            </td>
                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            
          

       
            

        </div>
    </div>


</body>

</html>






