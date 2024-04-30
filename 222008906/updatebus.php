<?php
require_once "./connection/config.php";

// Fetch data from the bus table
$sql = "SELECT * FROM bus";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $plate_number = $conn->real_escape_string($_POST['plate_number']);
    $seat_number = $conn->real_escape_string($_POST['seat_number']);

    // Update the bus record in the database
    $update_sql = "UPDATE bus SET Names='$name', Platenumber='$plate_number', Seatnumber='$seat_number' WHERE Bus_id='$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'viewb.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM bus WHERE Bus_id='$id'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the bus data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $name = $row['Names'];
        $plate_number = $row['Platenumber'];
        $seat_number = $row['Seatnumber'];
    } else {
        echo "Bus not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus</title>
</head>
<body>
    <h2>Bus Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="bus_id">Enter Bus ID:</label>
        <input type="text" id="bus_id" name="id" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($id)) : ?>
        <h1>Update Bus Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Bus Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            <label for="plate_number">Plate Number:</label>
            <input type="text" id="plate_number" name="plate_number" value="<?php echo $plate_number; ?>" required><br><br>
            <label for="seat_number">Seat Number:</label>
            <input type="number" id="seat_number" name="seat_number" value="<?php echo $seat_number; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
