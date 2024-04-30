
<?php
session_start(); // Make sure session is started before accessing session variables

// Check if the session variable "user_type" is not set or is null
if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] === null){
    header("Location: login.html");
    exit; // Always exit after a header redirect to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>


    <header style="background-color: darkgray; color: #fff; text-align: center; padding: 20px 0;">
        
        <h1>Welcome to RITCO MANAGEMENT SYSTEM</h1>
      <img class="logo-container" src="images/ritco.png" alt="Logo" >
    </header>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: darkorange;
            padding: 10px;
            text-align: center;
        }
        .logo-container {
    position: absolute;
    top: 10px; 
    left: 1px;
    width:100px;
     height:100px; 
}

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav li {
            display: inline;
            margin-right: 20px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #ddd;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-contents {
            display: none;
            position: absolute;
            background-color: gray;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown-contents a {
            color: black;
            padding: 3px 3px;
            text-decoration: none;
            display: block;
        }
        .dropdown-contents a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-contents {
            display: block;
        }
          main {
    display: flex;
    align-items: center;
}

          main {
    display: flex;
    align-items: center;
}

img {
    width: 50%; 
}

p {
    width: 50%; 
    text-align: left;
    margin-left: 20px;
    font-size: 30px; 
    padding: 30px; 
    background-color:darkgray; 
}

    </style>
</head>
<nav style="background-color:yellowgreen; padding: 10px; text-align: center;">
    <ul>
        <li>
            <a href="adminhome.php"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 10px;">HOME</a></li>
            <li>
            <a href="insertbus.php" style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 50px;">BUS</a></li>
            <li>
            <a href="viewc.php"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px;  margin-right: 120px;">CUSTOMER</a></li>
            <li><a href="viewd.php"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 200px;">DRIVERS</a></li>
            <li><a href="ticket.html"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 230px;; ">TICKET</a></li>
            <li class="dropdown">
            <a href="#">SETTING</a>
            <div class="dropdown-contents">
                <a href="adminsignup.html
                ">SIGNUP</a>
                 <div class="dropdown-contents">
                <a href="Logout.php">logout</a>
                
            </div>

        </li>
    </ul>
    </nav>

    <main>
     <img src="images/ritco.jpg" width="620" >
       <p title="admin note" margin>-Admin should view all data in the database of the system and allowed to update and delete the record<br>
   - Also he/she allowed to add ticket where he/she connect the customer with bus and driver.<br>
    -This reduce the wastage of time of service</p>
    </main>
    <footer style="background-color: yellowgreen; color: black; text-align: center; padding: 10px 0; position: fixed;  width: 100%;">
        <p2><marquee>&copy; RITCO MANAGEMENT SYSTEM GISA PATRICK 222008906</marquee></p2>
    </footer>

</body>
</html>
