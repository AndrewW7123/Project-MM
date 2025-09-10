<?php
/**
 * games.php
 *
 * Purpose: Displays the Games page where users can browse the game catalog.
 * Includes a category bar and dynamically loads game items using JavaScript.
 * Also adjusts navigation links based on user login session.
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT \"MM\" | Games</title>

    <!-- Page Icon -->
    <link rel="icon" href="5050small.jpg">

    <!-- JavaScript Files -->
    <script src="js/script.js"></script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/games.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />
</head>

<body>
    <!-- Navigation Bar -->
    <nav id="desktop-nav">
        <div class="logo">
            <mark style="background-color: #d03b43; color: white;">
                &nbsp;<strong>PROJECT MM</strong>&nbsp;
            </mark>
        </div>

        <div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="/project-mm/games.php">Games</a></li>
                <li><a href="coaches.php">Coaches</a></li>
                <li><a href="contact.php">Contact Us</a></li>

                <?php
                // Display login/logout options based on session state
                if (isset($_SESSION["name"])) {
                    echo "<li><a href=\"logout.php\" style=\"color: #d03b43\">Log Out</a></li>";
                    echo "<li style=\"color:rgb(79, 54, 206)\">{$_SESSION['name']}</li>";
                } else {
                    echo "<li><a href=\"sign-in/index.php\" style=\"color: #d03b43\">Sign In</a></li>";
                    echo "<li><a href=\"sign-up/index.php\" style=\"color: #d03b43\">Sign Up</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>

    <!-- Main Content: Bottom Section -->
    <div class="bottom-section">
        <!-- LEFT Column: Game Catalog Intro -->
        <aside class="left-content">
            <h1>Explore Our Catalog</h1>
            <p>Join our community of players, explore new worlds, and level up your gameplay experience.</p>
        </aside>

        <!-- RIGHT Column: Games and Categories -->
        <main class="right-content">
            <div class="category-bar">
                <button class="category active">All Games</button>
                <button class="category">Shooter</button>
                <button class="category">MOBA</button>
                <button class="category">Strategy</button>
            </div>

            <div class="game-list" id="game-list">
                <!-- Game cards will be dynamically injected here by JavaScript -->
            </div>
        </main>
    </div>

    <!-- JavaScript for Dynamic Game Loading -->
    <script src="./js/games/games.js"></script>
    <script src="./js/games/gamescript.js" defer></script>
</body>
</html>
