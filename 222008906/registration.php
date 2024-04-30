<?php
require_once "./connection/config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['uname'];
$email = $_POST['email'];
$phone = $_POST['phone']; // Changed variable name to match input name
$password = $_POST['password'];

$sql = "INSERT INTO signup(firstname, lastname, username, email, phone, password) VALUES ('$fname','$lname','$username','$email','$phone','$password')";

if ($conn->query($sql) === TRUE) {
   echo "Successfully registered!";
   header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
