<?php
require_once "./connection/config.php";

// Retrieve form data
if(isset($_POST['customerid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['addressto'])) {
    $customerid = $_POST['customerid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $addressto = $_POST['addressto'];

    // SQL query to insert data
    $sql = "INSERT INTO customer (customerid, Names, Email, mobile, address, addressto)
            VALUES ('$customerid', '$name', '$email', '$mobile', '$address', '$addressto')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
            header("Location: customer.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form data not complete";
}

$conn->close();
?>
