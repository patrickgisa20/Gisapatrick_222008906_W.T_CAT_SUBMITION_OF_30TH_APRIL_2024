<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View customer Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
    <h2>customer Information</h2>

    <table>
        <tr>
            <th>customer ID</th>
            <th>Names</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Addresto</th>
            <th colspan="2">Actions</th> <!-- Added colspan for update and delete -->
        </tr>

        <?php
      require_once "./connection/config.php";

        // Retrieve data from the database
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        // Output data in a table
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['customerid'] . "</td>";
                echo "<td>" . $row['Names'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['addressto'] . "</td>";
                echo "<td><a href='updatec.php'>update</a></td>"; // Update link
                echo "<td><a href='deletec.php'>Delete</a></td>"; // Delete link
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
