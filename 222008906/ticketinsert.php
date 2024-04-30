<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your MySQL database
require_once "./connection/config.php";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO ticket (ticket_id, Bus_id, customerid, driver_id, start, stop, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiissss", $ticket_id, $bus_id, $customer_id, $driver_id, $start, $stop, $date);

    // Set parameters
    $ticket_id = $_POST['ticket_id'];
    $bus_id = $_POST['Bus_id'];
    $customer_id = $_POST['customerid'];
    $driver_id = $_POST['driver_id'];
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    $date = $_POST['date'];

    // Check if bus_id exists
    $bus_query = "SELECT * FROM bus WHERE Bus_id = ?";
    $bus_stmt = $conn->prepare($bus_query);
    $bus_stmt->bind_param("i", $bus_id);
    $bus_stmt->execute();
    $bus_result = $bus_stmt->get_result();
    if ($bus_result->num_rows == 0) {
        echo "Error: Bus ID does not exist.";
        exit;
    }

    // Check if customer_id exists
    $customer_query = "SELECT * FROM customer WHERE customerid = ?";
    $customer_stmt = $conn->prepare($customer_query);
    $customer_stmt->bind_param("i", $customer_id);
    $customer_stmt->execute();
    $customer_result = $customer_stmt->get_result();
    if ($customer_result->num_rows == 0) {
        echo "Error: Customer ID does not exist.";
        exit;
    }

    // Check if driver_id exists
    $driver_query = "SELECT * FROM driver WHERE driver_id = ?";
    $driver_stmt = $conn->prepare($driver_query);
    $driver_stmt->bind_param("i", $driver_id);
    $driver_stmt->execute();
    $driver_result = $driver_stmt->get_result();
    if ($driver_result->num_rows == 0) {
        echo "Error: Driver ID does not exist.";
        exit;
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record inserted successfully";
            header("Location: ticket.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements and connection
    $stmt->close();
    $bus_stmt->close();
    $customer_stmt->close();
    $driver_stmt->close();
    $conn->close();
}
?>
