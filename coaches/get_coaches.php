<?php
/**
 * get_coaches.php
 * 
 * Purpose: Backend PHP script to fetch the list of top coaches from the database.
 * Returns coach data in JSON format to be used dynamically on the front-end.
 * 
 * Author: Haoran Li (Mike)
 * Date: April 25, 2025
 * Student Number: 400495145
 */

// Set response type to JSON
header('Content-Type: application/json');

// Include database connection
include '../connect.php';

// Get the game from the query parameter (currently unused, future feature)
$game = $_GET['game'] ?? '';

// Prepare SQL query to select coaches
// Only fetch users where isCoach = 1, sorted by highest rating
$stmt = $dbh->prepare("
    SELECT username, rating, biography 
    FROM accounts 
    WHERE isCoach = ? 
    ORDER BY rating DESC
");

// Execute the query with parameter binding
$params = [1];
$stmt->execute($params);

// Fetch all matching coaches as associative arrays
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the results as JSON
echo json_encode($coaches);
?>
