<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $bus_id = $_POST['bus_id'];

    // Delete bus record
    $sql = "DELETE FROM bus WHERE Bus_id=$bus_id";

    if ($conn->query($sql) === TRUE) {
        echo "Bus record deleted successfully";
          header("Location: viewb.php");
    } else {
        echo "Error deleting bus record: " . $conn->error;
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
    <h2>Delete Bus Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="bus_id">Select Bus to Delete:</label>
        <select name="bus_id">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM bus";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Bus_id'] . "'>" . $row['Names'] . " - " . $row['Platenumber'] . "</option>";
                }
            } else {
                echo "<option value=''>No buses available</option>";
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

