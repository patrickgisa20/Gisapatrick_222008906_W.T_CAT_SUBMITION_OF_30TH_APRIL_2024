<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Driver Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
    <h2>Driver Information</h2>

    <table>
        <tr>
            <th>Driver ID</th>
            <th>Names</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>License</th>
            <th colspan="2">Actions</th> <!-- Added colspan for update and delete -->
        </tr>

        <?php
    require_once "./connection/config.php";

        // Retrieve data from the database
        $sql = "SELECT * FROM driver";
        $result = $conn->query($sql);

        // Output data in a table
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['driver_id'] . "</td>";
                echo "<td>" . $row['names'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['licence'] . "</td>";

                echo "<td><a href='updated.php'>update</a></td>"; // Update link
                echo "<td><a href='deleted.php'>Delete</a></td>"; // Delete link
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>"; // Adjusted colspan
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
