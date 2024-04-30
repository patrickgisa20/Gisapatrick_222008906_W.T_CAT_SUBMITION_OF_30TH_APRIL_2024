<?php
// Start session
session_start();

// Database connection parameters
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the user is an admin
    $admin_query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        // Set session variables for admin
        $_SESSION['user_type'] = 'admin';
        $_SESSION['email'] = $email;
        // Redirect to admin dashboard or index page
        header("Location: adminhome.php");
        exit();
    } 
    else {
        // Invalid login credentials
        $error = "Invalid email or password";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>ADMIN LOGIN</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
