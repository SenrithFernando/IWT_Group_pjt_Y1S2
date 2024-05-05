<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form action="includes/signup.inc.php" method="post">
        <label for="newUsername">Username:</label>
        <input type="text" id="newUsername" name="newUsername" required>

        <label for="newUsername">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="newPassword">Password:</label>
        <input type="password" id="newPassword" name="pwd" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="pwdrepeat" required>

        <button type="submit" name="submit">Register</button>
        <a href="login.php">if you have already account</a>
    </form>
</body>
</html>
