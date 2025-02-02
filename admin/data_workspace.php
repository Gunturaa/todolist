<?php
require_once "../auth/db.php";

if (!$link) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$query = "SELECT * FROM workspace JOIN users ON workspace.id_user=users.id_user";
$result = mysqli_query($link, $query);

// Existing code to display data...
