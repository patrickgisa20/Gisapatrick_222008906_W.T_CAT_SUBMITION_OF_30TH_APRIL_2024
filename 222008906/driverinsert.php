<?php
require_once "./connection/config.php";

// Retrieve form data
$driver_id = $_POST['driver_id'];
$names = $_POST['names'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$license = $_POST['license'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO driver (driver_id, names, mobile, email, licence) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $driver_id, $names, $mobile, $email, $license);

// Execute SQL statement
if ($stmt->execute()) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href = 'driver.html';</script>"; 
        
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>