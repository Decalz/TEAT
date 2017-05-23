<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

// Set variables used to access the database. In this case, WAMP was used with phpMyAdmin.
$database = "teat";
$user = "root";
$pass = "";
$id= $_GET["id"];

// Attempt connection, if error print the error out.
$connection = new mysqli("localhost", $user, $pass, $database);

if ($connection->connect_error) {

    echo "<p>Could not connect to the " .
        "database: " . $connection->connect_error . "</p>\n";
    exit;
}

//Set value of name of the table.
$tName = "product";
$t2Name = "cart";
$sql = "INSERT INTO $t2Name (Name, Description, Price)
SELECT Name, Description, Price
FROM $tName
WHERE Id=$id";
	
	if($result = $connection->query($sql)){
    echo "<p>Successfully inserted the new record</p>";
    echo "<p><a href='ourproducts.php'>Go Back</a> </p>";
}

else
{
    echo "<p>Unable to insert the record</p>";
    echo "<p><a href='ourproducts.php'>Go Back</a> </p>";
}

$connection->close();
	?>
</body>
</html>