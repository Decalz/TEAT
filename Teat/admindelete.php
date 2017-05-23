<?php
$id = $_GET['id'];
// Database values
$database = "teat"; // WAMP was used for the database
$user = "root";
$pass = "";
// Try to connect
$conn = new mysqli("localhost", $user, $pass, $database);
if ($conn->connect_error) {
    echo "<p>Could not connect to the $database " .
        "database: " . $conn->connect_error . "</p>\n";
    exit;
}
$tName = "product";
// Add a DELETE SQL command using data sent by user
$sql = "DELETE FROM $tName
WHERE Id=$id";

if ($result = $conn->query($sql)) {
        $conn->close();
	
		header("Location: admin.php");
		die();
    } else {
		$conn->close();
	
        echo "<p>Unable to delete the record</p>";
        echo "<p><a href='admin.php'>Go Back</a> </p>";
    }
?>