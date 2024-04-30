<?php
require_once "./connection/config.php";

// Fetch data from the customer table
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $address = $conn->real_escape_string($_POST['address']);
    $addressto = $conn->real_escape_string($_POST['addressto']);

    // Update the customer record in the database
    $update_sql = "UPDATE customer SET Names='$name', Email='$email', mobile='$mobile', address='$address', addressto='$addressto' WHERE customerid='$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'customer_view.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM customer WHERE customerid='$id'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the customer data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $name = $row['Names'];
        $email = $row['Email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $addressto = $row['addressto'];
    } else {
        echo "Customer not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
</head>
<body>
    <h2>Customer Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="customer_id">Enter Customer ID:</label>
        <input type="text" id="customer_id" name="id" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($id)) : ?>
        <h1>Update Customer Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br><br>
            <label for="addressto">Address To:</label>
            <input type="text" id="addressto" name="addressto" value="<?php echo $addressto; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
