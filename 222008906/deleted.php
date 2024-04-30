<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $driver_id = $_POST['driver_id'];

    // Delete bus record
    $sql = "DELETE FROM driver WHERE driver_id=$driver_id";

    if ($conn->query($sql) === TRUE) {
        echo "Bus record deleted successfully";
          header("Location: viewd.php");
    } else {
        echo "Error deleting driver record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bus Record</title>
</head>
<body>
    <h2>Delete driver Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="driver_id">Select driver to Delete:</label>
        <select name="driver_id">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM driver";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['driver_id'] . "'>" . $row['names'] . $row['licence'] ." - " . $row['email'] . "</option>";
                }
            } else {
                echo "<option value=''>No drivers available</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>

