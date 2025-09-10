<?php
/*
Andrew Whitehead
400581822
April 10, 2025
PHP program which displays contact services for PROJECT-MM
*/
session_start(); //Start the session to track whether the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <title>PROJECT "MM" | Games</title>
    <link rel="icon" href="5050small.jpg">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />
    <link rel="stylesheet" href="css/contact.css" />
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <mark style="background-color: #d03b43; color: white;">
                &nbsp;<strong>PROJECT MM</strong>&nbsp;</mark>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="games.php">Games</a></li>
                <li><a href="coaches.php">Coaches</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION["name"])){
                    echo "<li><a href=\"logout.php\" style=\"color: #d03b43\">Log Out</a></li>";
                    echo "<li style=\"color:rgb(79, 54, 206)\">$_SESSION[name]</li>";
                } else {
                    echo "<li><a href=\"sign-in/index.php\" style=\"color: #d03b43\">Sign In</a></li>";
                    echo "<li><a href=\"sign-up/index.php\" style=\"color: #d03b43\">Sign Up</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <nav id="hamburger-nav">
        <div class="logo">
            <mark style="background-color: #d03b43; color: white;">
                &nbsp;<strong>50/50.</strong>&nbsp;</mark>
        </div>
        <div>
            <div class="hamburger-menu">
                <div class="hamburger-icon" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="menu-links">
                  <li><a href="index.php" onclick="toggleMenu()">Home</a></li>
                  <li><a href="games.php" onclick="toggleMenu()">Games</a></li>
                  <li><a href="coaches.php" onclick="toggleMenu()">Coaches</a></li>
                  <li><a href="contact.php" onclick="toggleMenu()">Contact Us</a></li>
                  <li><a href="" onclick="toggleMenu()">About Us</a></li>
              </div>
            </div>
    </nav>
    <div id="main">
        <h1>Contact Us</h1>
        <h3>Need to get in touch with us?</h3>
        <div id="contactpanel">
            <div class="contacts">
                <img src="images/contact/phone.png" style="max-width: 50px;">
                <h3>Call Us</h3>
                <h2>You can reach us through our call service at</h2>
                <h3>+1 (800) 555 5555</h3>
            </div>
            <div class="contacts">
                <img src="images/contact/email.png" style="max-width: 50px;">
                <h3>Email Us</h3>
                <h2>You can reach us through our email service at</h2>
                <h3>support@projectmm.com</h3>
            </div>
        </div>
        <h3>Urgent inquiries should be directed to our call service for a quick response</h3>
        <h3>A help agent will be sure to accomodate your request!</h3>
    </div>
  </div>
</body>
</html>