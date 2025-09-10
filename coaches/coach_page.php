<?php
/**
 * coach_page.php
 * 
 * Purpose: This page displays detailed coach information for a selected game, 
 * including dynamic loading of news updates, featured clips, and top coaches.
 * Depending on the user's session state, it dynamically displays login/logout options.
 * 
 * Author: Haoran Li (Mike)
 * Date: April 25, 2025
 * Student Number: 400495145
 */

session_start(); // Start the session to track whether the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coach Info | Project MM</title>

    <!-- Global Stylesheet -->
    <link rel="stylesheet" href="../css/global.css">
    <!-- Specific Coach Page Stylesheet -->
    <link rel="stylesheet" href="css/coach_page.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav id="desktop-nav">
        <div class="logo">
            <mark style="background-color: #d03b43; color: white;">
                &nbsp;<strong>PROJECT MM</strong>&nbsp;
            </mark>
        </div>

        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../games.php">Games</a></li>
            <li><a href="../coaches.php">Coaches</a></li>
            <li><a href="../contact.php">Contact Us</a></li>

            <?php
            // Display login/logout options based on session state
            if (isset($_SESSION["name"])) {
                echo "<li><a href=\"../logout.php\" style=\"color: #d03b43\">Log Out</a></li>";
                echo "<li style=\"color:rgb(79, 54, 206)\">{$_SESSION['name']}</li>";
            } else {
                echo "<li><a href=\"../sign-in/index.php\" style=\"color: #d03b43\">Sign In</a></li>";
                echo "<li><a href=\"../sign-up/index.php\" style=\"color: #d03b43\">Sign Up</a></li>";
            }
            ?>
        </ul>
    </nav>

    <!-- Main Content: Three Column Layout -->
    <div class="coach-container">
        
        <!-- Column 1: Game Name & News Feed -->
        <div class="column column-left">
            <h2 id="game-title">Loading...</h2>
            <div class="game-news">
                <h3>Game News</h3>
                <ul id="news-feed"></ul>
            </div>
        </div>

        <!-- Column 2: Featured Clips & Events -->
        <div class="column column-middle">
            <h3>Featured Clips & Events</h3>
            <div id="clip-container"></div> <!-- Dynamically populated by JavaScript -->
        </div>

        <!-- Column 3: Top Coaches List -->
        <div class="column column-right">
            <h3>Top Coaches</h3>
            <div id="coach-list"></div> <!-- Dynamically populated by JavaScript -->
        </div>

    </div>

    <!-- JavaScript to Handle Dynamic Content -->
    <script src="js/coaches.js"></script>
</body>
</html>
