<?php
session_start();
require_once "../auth/db.php";

if (!$link) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Existing code for editing todo
$id = $_GET['id_todo'];
$title = $_GET['title'];
$dl = $_GET['deadline'];
$status = $_GET['status'];
$goal = $_GET['id_goal'];
$queryTd = "UPDATE todo SET title='$title', deadline='$dl', status='$status' WHERE id_todo='$id'";
// Execute the query...
