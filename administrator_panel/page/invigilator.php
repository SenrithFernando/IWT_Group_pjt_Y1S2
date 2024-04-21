<?php
include "dbcon.php";

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: ../login.php');
    exit();
}


$useruid = $_SESSION['useruid'];




if(isset($_GET['invigilatorid'])){
    $emp_type=$_GET['invigilatorid'];
   
    // $searchQ="SELECT * FROM `employee` WHERE `type`='$emp_type'";

    // echo $emp_type;
                        
    // $result=mysqli_query($conn,$searchQ);

    // if($result){
    // // echo "Select Ok";
    // }?>
    <?php
    // while($row=mysqli_fetch_assoc($result)){
    // $e_id=$row['empid'];
    // $name=$row['name'];
    // $nic=$row['nic'];
    // $address=$row['address'];
    // $telephone=$row['telephone'];
    // $gender=$row['gender'];
    // $type=$row['type'];
    // $email=$row['email'];
    // $password=$row['password'];

// }

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
                <h2>Employee</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>

            <div class="t-table">
                    <h2>invigilator Details</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Type</th>
                                <th>Re arranges</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <?php
                            $searchQ="SELECT * FROM `employee` WHERE `type`='$emp_type'";
                        
                            $result=mysqli_query($conn,$searchQ);
                        
                            if($result){
                            // echo "Select Ok";
                            }?>
                            <?php
                            while($row=mysqli_fetch_assoc($result)){

                                $e_id=$row['empid'];
                                $name=$row['name'];
                                $nic=$row['nic'];
                                $address=$row['address'];
                                $telephone=$row['telephone'];
                                $gender=$row['gender'];
                                $type=$row['type'];
                                $email=$row['email'];
                                $password=$row['password'];
                            
                            
                            
                            ?>
                            <tr>
                            <td scope="row"><?php echo $e_id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $emp_type ?></td>
                            
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






