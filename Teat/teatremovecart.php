<?php

$id = $_GET['id'];


// Add your database name (username), username and password
$database = "teat"; // The database name is your username
$user = "root";
$pass = "";

// Try to connect
$conn = new mysqli("localhost", $user, $pass, $database);

if ($conn->connect_error) {
    echo "<p>Could not connect to the $database " .
        "database: " . $conn->connect_error . "</p>\n";
    exit;
}

$tName = "cart";

// Add an INSERT SQL command using data sent by user
$sql = "DELETE FROM $tName
WHERE Id=$id";

$conn->query($sql);

$conn->close();

header("Location: teatcart.php");
die();

?>