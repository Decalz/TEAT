<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Delete From Cart</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>

<body>

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

if($result = $conn->query($sql)){
    echo "<p>Successfully deleted the record</p>";
    echo "<p><a href='cart.php'>Go Back</a> </p>";
}

else
{
    echo "<p>Unable to delete the record</p>";
    echo "<p><a href='cart.php'>Go Back</a> </p>";
}

$conn->close();

?>

</body>
</html>
