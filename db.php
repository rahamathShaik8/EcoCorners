<?php
$conn = mysqli_connect("localhost", "root", "Hrdss@15", "ecoCornersDB");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
