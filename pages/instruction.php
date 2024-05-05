<?php
include "../conn/dbcon.php"; 

session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: ../login.php');
    exit();
}

$useruid = $_SESSION['useruid'];

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
        <title>Exam Notices</title>
        <link rel="stylesheet" href="../css/ins_style.css" />
        <?php include "../library/head.php"; ?>
    </head>
    <body>
<div class="hed">
    <?php include "../library/nav.php"; ?>  
</div>
     


        <div class="ins_containers">
            <h2>Exam Notices</h2>
            <?php
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $exid = $row["examid"];
                    $sql1 = "SELECT * FROM exam WHERE `id`='$exid'";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_assoc($result1)) {
                            $exname = $row1["name"];
                            ?>
                            <div class="ins_card_container">
                                <div class="ins_card">
                                    <h3><?php echo $exname; ?></h3>
                                    <p><?php echo $row["instructions"]; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            ?>
        </div>

        <div class="fot">
            <?php include "../library/footer.php"; ?> 
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No instructions found.";
}

mysqli_close($conn);
?>
