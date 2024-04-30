<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $ticket_id = $_POST['ticket_id'];

    // Delete bus record
    $sql = "DELETE FROM ticket WHERE ticket_id=$ticket_id";

    if ($conn->query($sql) === TRUE) {
        echo "ticket record deleted successfully";
          header("Location: viewt.php");
    } else {
        echo "Error deleting ticket record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete ticket Record</title>
</head>
<body>
    <h2>Delete ticket Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="customerid">Select ticket to Delete:</label>
        <select name="ticket_id">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM ticket";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ticket_id'] . "'>" . $row['Bus_id'] . $row['customerid']  . $row['driver_id'] . $row['start'] . $row['stop']. $row['Date']." - " . $row[''] . "</option>";
                }
            } else {
                echo "<option value=''>No ticket available</option>";
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

