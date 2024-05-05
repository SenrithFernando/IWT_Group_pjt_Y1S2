<?php
include "conn/dbcon.php"; 
 
// Fetch exam titles from the database
$sql = "SELECT * FROM exam"; // Change "exams" to your actual table name
$result = mysqli_query($conn, $sql);


?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Exam Instruction</title>
<link rel="stylesheet" href="styles/ins_style.css">
</head>
<body>

<div class="ins_container">
  <h2>Add Exam Instruction</h2>
  <form class="ins_form" action="php/add_inst.php" method="POST">
    <div class="ins_form_group">
      <label for="exam_title" class="ins_label">Exam Title:</label>
      <select id="exam_title" name="exam_title" class="ins_input" required>
      <option value="">Select Exam</option>
      <?php
        if (mysqli_num_rows($result) > 0) {
            $exam_options = '';
            while($row = mysqli_fetch_assoc($result)) {
                ?><option value="<?php echo $row['id'];; ?>"><?php echo $row['name']; ?></option><?php
            }
        } else {
           ?><option value="">No exams found</option>;<?php
        }
      ?>
       
        
      </select>
    </div>
    <div class="ins_form_group">
      <label for="instructions" class="ins_label">Instructions:</label>
      <textarea id="instructions" name="instructions" rows="5" class="ins_textarea" required></textarea>
    </div>
    <button type="submit" class="ins_button">Submit</button>
  </form>
  <a class="ins_view_button"  href="instrucview.php"><button class="ins_view_button">View</button></a>
  <a class="ins_view_button"  href="instruction.php"><button class="ins_view_button">instructin</button></a>
</div>

</body>
</html>
