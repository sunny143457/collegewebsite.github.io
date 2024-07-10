<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Check if username and password match the admin credentials (replace with your actual credentials)
        $admin_username = "admin";
        $admin_password = "admin";

        // Retrieve username and password from the form submission
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate admin credentials
        if ($username === $admin_username && $password === $admin_password) {
            // Set session variables
            $_SESSION['username'] = $username;
            // Redirect to admin panel or dashboard page
            header("Location: admin.php");
            exit;
        } else {
            // Invalid credentials
            $error = "Invalid username or password";
        }
    } else {
        // Missing username or password
        $error = "Username and password are required";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
