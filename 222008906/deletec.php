<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $customerid = $_POST['customerid'];

    // Delete bus record
    $sql = "DELETE FROM customer WHERE customerid=$customerid";

    if ($conn->query($sql) === TRUE) {
        echo "Bus record deleted successfully";
          header("Location: viewc.php");
    } else {
        echo "Error deleting customer record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete customer Record</title>
</head>
<body>
    <h2>Delete driver Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="customerid">Select customer to Delete:</label>
        <select name="customerid">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM customer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['customerid'] . "'>" . $row['Names'] . $row['Email']  . $row['mobile'] . $row['address'] . $row['addressto']." - " . $row[''] . "</option>";
                }
            } else {
                echo "<option value=''>No customer available</option>";
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

