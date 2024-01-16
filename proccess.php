<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and perform necessary validation
    // Insert data into the database

    // Redirect to preview page
    header("Location: preview.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
