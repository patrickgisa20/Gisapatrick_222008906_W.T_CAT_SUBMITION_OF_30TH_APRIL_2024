<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View ticket Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
    <h2>ticket Information</h2>

    <table>
        <tr>
            <th>TicketID</th>
            <th>Bus_id</th>
            <th>customerid</th>
            <th>driver_id</th>
            <th>start</th>
            <th>stop</th>
            <th>date</th>
            <th colspan="2">Actions</th> <!-- Added colspan for update and delete -->
        </tr>

        <?php
require_once "./connection/config.php";

        // Retrieve data from the database
        $sql = "SELECT * FROM ticket";
        $result = $conn->query($sql);

        // Output data in a table
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ticket_id'] . "</td>";
                echo "<td>" . $row['Bus_id'] . "</td>";
                echo "<td>" . $row['customerid'] . "</td>";
                echo "<td>" . $row['driver_id'] . "</td>";
                echo "<td>" . $row['start'] . "</td>";
                echo "<td>" . $row['stop'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td><a href='updatet.php'>update</a></td>"; // Update link
                echo "<td><a href='deletet.php'>Delete</a></td>"; // Delete link
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>"; // Adjusted colspan
        }

        // Close connection
        $conn->close();
        ?>

    </table>
        <!-- Button to go back to the form -->
    <button type="button" onclick="location.href='adminhome.php';">Go Back</button>
</center>
</body>
</html>
