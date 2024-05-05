<?php
include "dbcon.php"; 

?>





    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ins_style.css">
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
                <h2>Employee</h2><a href="../includes/logout.inc.php">Logout</a>
            </div>
            

            <div class="ins_container">
       
       <?php
       // Check if instruction ID is provided in the URL
       if(isset($_GET['updateid'])) {
           $updateid = $_GET['updateid'];

           // Fetch instruction details based on ID from the database
           $sql = "SELECT * FROM instruction WHERE id = '$updateid'";
           $result = mysqli_query($conn, $sql);

           if(mysqli_num_rows($result) > 0) {
               $row = mysqli_fetch_assoc($result);
       ?>
               <form class="ins_form" action="php/update_inst.php" method="POST">
                   <input type="hidden" name="updateid" value="<?php echo $row['id']; ?>">
                   <div class="ins_form_group">
                       <label for="exam_title" class="ins_label">Exam Title:</label>
                       <input type="text" id="exam_title" name="exam_title" class="ins_input" value="<?php echo $row['examid']; ?>" required>
                   </div>
                   <div class="ins_form_group">
                       <label for="instructions" class="ins_label">Instructions:</label>
                       <textarea id="instructions" name="instructions" rows="5" class="ins_textarea" required><?php echo $row['instructions']; ?></textarea>
                   </div>
                   <button type="submit" class="ins_button">Update</button>
               </form>
       <?php
           } else {
               echo "No instruction found with the provided ID.";
           }
       } else {
           echo "Instruction ID not provided.";
       }
       ?>
   </div>



            

            
          

       
            
          
        </div>

        
    </div>


</body>

</html>









