<?php
require_once "./connection/config.php";

// Fetch data from the driver table
$sql = "SELECT * FROM driver";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $licence = $conn->real_escape_string($_POST['licence']);

    // Update the driver record in the database
    $update_sql = "UPDATE driver SET names='$name', mobile='$mobile', email='$email', licence='$licence' WHERE driver_id='$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'viewd.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM driver WHERE driver_id='$id'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the driver data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $name = $row['names'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $licence = $row['licence'];
    } else {
        echo "Driver not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Driver</title>
</head>
<body>
    <h2>Driver Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="driver_id">Enter Driver ID:</label>
        <input type="text" id="driver_id" name="id" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($id)) : ?>
        <h1>Update Driver Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="licence">Licence:</label>
            <input type="text" id="licence" name="licence" value="<?php echo $licence; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
