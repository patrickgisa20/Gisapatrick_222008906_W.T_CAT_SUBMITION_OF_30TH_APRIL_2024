<?php
require_once "./connection/config.php";

// Fetch data from the ticket table
$sql = "SELECT * FROM ticket";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $ticket_id = $conn->real_escape_string($_POST['ticket_id']);
    $start = $conn->real_escape_string($_POST['start']);
    $stop = $conn->real_escape_string($_POST['stop']);
    $date = $conn->real_escape_string($_POST['date']);

    // Update the ticket record in the database
    $update_sql = "UPDATE ticket SET start='$start', stop='$stop', Date='$date' WHERE ticket_id='$ticket_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'ticket_view.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['ticket_id'])) {
    $ticket_id = $conn->real_escape_string($_GET['ticket_id']);
    $select_sql = "SELECT * FROM ticket WHERE ticket_id='$ticket_id'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the ticket data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $start = $row['start'];
        $stop = $row['stop'];
        $date = $row['Date'];
    } else {
        echo "Ticket not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket</title>
</head>
<body>
    <h2>Ticket Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="ticket_id">Enter Ticket ID:</label>
        <input type="text" id="ticket_id" name="ticket_id" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($ticket_id)) : ?>
        <h1>Update Ticket Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
            <label for="start">Start:</label>
            <input type="text" id="start" name="start" value="<?php echo $start; ?>" required><br><br>
            <label for="stop">Stop:</label>
            <input type="text" id="stop" name="stop" value="<?php echo $stop; ?>" required><br><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
