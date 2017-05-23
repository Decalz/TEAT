<?php

// Set variables used to access the database. In this case, WAMP was used with phpMyAdmin.
$database = "teat";
	$user = "root";
	$pass = "";

	$connection = new mysqli("localhost", $user, $pass, $database);
$id= $_GET["id"];


if ($connection->connect_error) {

    echo "<p>Could not connect to the " .
        "database: " . $connection->connect_error . "</p>\n";
    exit;
}

//Set value of name of the table.
$tName = "product";
$t2Name = "cart";
$sql = "INSERT INTO $t2Name (Name, Description, Price, Image)
SELECT Name, Description, Price, Image
FROM $tName
WHERE Id=$id";
	
$connection->query($sql);

$connection->close();

header("Location: teatproducts.php");
die();
	?>