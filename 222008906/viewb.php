<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <style>
        body {
            text-align: center; 
        }
        table {
            width: 70%; 
            margin: 0 auto; 
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid blue;
            padding: 8px;
            text-align: left;
            background-color: skyblue;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Bus Information</h2>

    <table >
        <thead>
            <tr>
                <th>Bus ID</th>
                <th>Names</th>
                <th>Plate Number</th>
                <th>Seat Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
           require_once "./connection/config.php";

            // Fetch bus records from the database
            $sql = "SELECT * FROM bus";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['Bus_id']) ? $row['Bus_id'] : '') . "</td>";
                    echo "<td>" . (isset($row['Names']) ? $row['Names'] : '') . "</td>";
                    echo "<td>" . (isset($row['Platenumber']) ? $row['Platenumber'] : '') . "</td>";
                    echo "<td>" . (isset($row['Seatnumber']) ? $row['Seatnumber'] : '') . "</td>";
                    echo "<td>
                            <a href='updatebus.php?'>Update</a>
                            <a href='deletebus.php'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Button to go back to the form -->
    <button type="button" onclick="location.href='adminhome.php';">Go Back</button>

</body>
</html>
