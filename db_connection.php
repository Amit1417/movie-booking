<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";          // Keep this empty
$dbname     = "movie_booking";
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Database Connection Error: " . $conn->connect_error . "<br><br>Please check root password in XAMPP.");
}
?>