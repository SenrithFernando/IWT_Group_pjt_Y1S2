<?php
include "conn/dbcon.php"; 

// session_start();
// if (!isset($_SESSION['userid'])) {
//     header('Location: ../login.php');
//     exit();
// }

// $useruid = $_SESSION['useruid'];

// Fetch instructions from the database
$sql = "SELECT * FROM instruction";
$result = mysqli_query($conn, $sql);

// Check if there are any instructions
if (mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Instructions</title>
        <link rel="stylesheet" href="styles/ins_style.css">
    </head>
    <body>
        <div class="ins_container">
            <h2>Instructions</h2>
            <table class="ins_table">
                <thead>
                    <tr>
                        <th>Exam Title</th>
                        <th>Instructions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["examid"]; ?></td>
                            <td><?php echo $row["instructions"]; ?></td>
                            <td style=width:20%;>
                                <a href="edit_inst.php?id=<?php echo $row['id']; ?>" class="ins_edit_buttons">Edit</a>
                                <a href="php/del_ins.php? deleteid=<?php echo $row['id']; ?>" class="ins_delete_buttons">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No instructions found.";
}

mysqli_close($conn);
?>
