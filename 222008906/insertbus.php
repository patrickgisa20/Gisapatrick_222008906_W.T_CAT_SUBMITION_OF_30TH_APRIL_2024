<?php
require_once "./connection/config.php";

// Extract data from the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Bus_id = $_POST['Bus_id'];
    $Names = $_POST['Names'];
    $Platenumber = $_POST['Platenumber'];
    $Seatnumber = $_POST['Seatnumber'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO bus (Bus_id, Names, Platenumber, Seatnumber) VALUES ('$Bus_id', '$Names', '$Platenumber', '$Seatnumber')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: bus.html");
        exit; // Ensure script stops executing after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Information Form</title>
       <link rel="stylesheet" type="text/css" href="style.css">
 <style>
nav{
    display: flex;
    justify-content: space-between;

}
nav ul{
    list-style: none;
    margin: 0;
    padding: 0;
}
nav li{
    display: inline-block;
    margin-right: 20px;

}
nav a{
    text-decoration: none;
    color: black;
}
nav a:hover{
    color: red;
}
.dropdown{
    position: right;

    display: inline-block;
    direction: rtl;
}
.dropdown-contents{
    display: none;
    position: absolute;
    background-color: darkorange;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.dropdown-contents a{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-contents a:hover{
    background-color: #ddd;
}
.dropdown:hover .dropdown-contents{
    display: block;

}
    </style>
</head>
<body>
    <nav style="background-color:greenyellow; padding: 10px; text-align: center;">
        <ul>
            <li>
                <img class="logo" src="images\log.JPG" alt="Logo" width="100" height="50">
            </li>
            <li>
                <a href="adminhome.php" style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 850px;">HOME</a>
            </li>
            <li class="dropdown">
                <a href="#">SETTINGS</a>
                <div class="dropdown-contents">
                    <a href="registration.html">SIGNUP</a>
                    <a href="Logout.php">logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <h2>Bus Information Form</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="bus_id">Bus ID:</label>
        <input type="number" id="Bus_id" name="Bus_id" required><br>

        <label for="names">Names:</label>
        <input type="text" id="Names" name="Names" required><br>

        <label for="platenumber">Plate Number:</label>
        <input type="text" id="Platenumber" name="Platenumber" required><br>

        <label for="seatnumber">Seat Number:</label>
        <input type="number" id="Seatnumber" name="Seatnumber" required><br>

        <input type="submit" value="Submit">
        <button type="button" onclick="location.href='viewb.php';">View</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
