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

    // Check if the user is a regular user
    $user_query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $user_result = $conn->query($user_query);

    
    if ($user_result->num_rows > 0) {
        // Set session variables for user
        $_SESSION['user_type'] = 'signup';
        $_SESSION['email'] = $email;
        // Redirect to user dashboard or index page
        header("Location:userhome.php");
        exit();
    } 
    else {
        // Invalid login credentials
        echo "Invalid email or password";
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
    <div class="login-container">
        <h2>USER LOGIN</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
