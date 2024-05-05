<?php
include "dbcon.php"; 

?>


    <div class="ins_container">
        <h2>Update Instruction</h2>
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

