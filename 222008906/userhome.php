<?php
session_start(); // Make sure session is started before accessing session variables

// Check if the session variable "user_type" is not set or is null
if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] === null){
    header("Location:userlogin.php");
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
        
        <h1>Welcome to RITCO MANAGEMENT SYSTEM(USER INTERFACE)</h1>
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
                .logo-container {
    position: absolute;
    top: 10px; 
    left: 1px;
    width:100px;
     height:100px; 
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
            padding: 3px 4px;
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
            <a href="userhome.php"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 10px;">HOME</a></li>
            <li>
            <a href="customer.html"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px;  margin-right: 120px;">CUSTOMER</a></li>
            <li><a href="driver.html"style="color: #333; text-decoration: none; padding: 10px; border-radius: 5px; margin-right: 200px;">DRIVERS</a></li>
            <li class="dropdown">
            <a href="#">SETTING</a>
            <div class="dropdown-contents">
                <a href="registration.html
                ">SIGNUP</a>
                <a href="Logout.php">logout</a>
                
            </div>

        </li>
    </ul>
    </nav>

    <main>
     <img src="images/ritco.jpg" width="620">

     <p title="USER NOTE" margin>-User  here we mean customer,drivers are  only allowed to insert he/her information.<br>
   - Also he/she allowed to create account where admin will connect him/her with the driver and bus .<br>
    -Time management and as our moto we link people with places</p>
    </main>
    <footer style="background-color: yellowgreen; color: black; text-align: center; padding: 10px 0; position: fixed;  width: 100%;">
        <marquee>&copy; RITCO MANAGEMENT SYSTEM</marquee>
    </footer>

</body>
</html>
