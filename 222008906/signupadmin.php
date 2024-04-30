<?php
// Database connection parameters
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $position = $conn->real_escape_string($_POST['position']);

    // Insert data into the database
    $insert_query = "INSERT INTO admin (email, password, position) VALUES ('$email', '$password', '$position')";
    if ($conn->query($insert_query) === TRUE) {
          echo "<script>alert('Record insert successfully');</script>";
        echo "<script>window.location.href = 'adminlogin.php';</script>"; 
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
