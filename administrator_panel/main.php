<!-- <?php

session_start();
if (!isset($_SESSION['userid'])) {

    header('Location: login.php');
    exit();
}


$useruid = $_SESSION['useruid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Our Website, <?php echo $useruid; ?>!</h1>
            <nav>
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="includes/logout.inc.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <p>This is the home page content. You can customize it based on your needs.</p>
        </main>

        <footer>
            <p>&copy; 2023 Your Website Name</p>
        </footer>
    </div>
</body>
</html> -->
