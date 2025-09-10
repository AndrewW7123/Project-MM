<?php
/**
 * coach.php
 * 
 * Purpose: This page displays a pop-up selection page for coaches where users can select a game.
 * Depending on the user's session state, it also dynamically displays login/logout options.
 * 
 * Author: Haoran Li (mike)
 * Date: April 25, 2025
 * Student Number: 400495145
 */

session_start(); // Start the session to track if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select a Game | Coaches</title>

    <!-- Global Stylesheet -->
    <link rel="stylesheet" href="css/global.css">
    <!-- Coaches Page Specific Stylesheet -->
    <link rel="stylesheet" href="coaches/css/coaches.css">
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
            <li><a href="index.php">Home</a></li>
            <li><a href="games.php">Games</a></li>
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
    </nav>

    <!-- Main Content: Game Selection -->
    <main class="game-popup-container">
        <h1 class="popup-title">Select a Game</h1>

        <div class="game-grid">
            <!-- Game Selection Boxes -->
            <a class="game-box" href="coaches/coach_page.php?game=FORTNITE">
                <img src="images/games/fortnite.gif" alt="Fortnite">
                <div class="game-label">FORTNITE</div>
            </a>

            <a class="game-box" href="coaches/coach_page.php?game=VALORANT">
                <img src="images/games/valorant.gif" alt="Valorant">
                <div class="game-label">VALORANT</div>
            </a>

            <a class="game-box" href="coaches/coach_page.php?game=LEAGUE OF LEGENDS">
                <img src="images/games/league.gif" alt="League of Legends">
                <div class="game-label">LEAGUE OF LEGENDS</div>
            </a>
        </div>
    </main>
</body>
</html>
