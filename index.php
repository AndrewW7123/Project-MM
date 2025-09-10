<?php
session_start(); //Start the session to track whether the user is logged in

?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <title>PROJECT "MM"</title>
    <link rel="icon" href="5050small.jpg">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="stylesheet" href="css/mediaqueries.css" />
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
                <li><a href="/project-mm/games.php">Games</a></li>
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
    <div class="img"></div>
    <div class="center">
        <div class="title">PROJECT "MM"</div>
        <div class="sub_title">Bringing you North America's
            <mark style="background-color: #d03b43; color: white;">
                &nbsp;#1 Pro-Esports.&nbsp;
        </div>
    </div>
  </body>

</html>