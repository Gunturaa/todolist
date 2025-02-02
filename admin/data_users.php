<?php
require_once "../auth/db.php";

if (!$link) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);

// Existing code to display data...
