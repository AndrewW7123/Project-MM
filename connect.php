<?php
/*
Andrew Whitehead
400581822
March 12, 2025
PHP script which allows all PHP files to access the database
*/
try {
    $dbh = new PDO("mysql:host=localhost;dbname=5050", 
    "root", 
    "");

} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>