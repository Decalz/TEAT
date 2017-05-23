<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TEAT - Cart</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header>
	<h1>TEAT</h1>
	<h3>The Way of the Lazy</h3>
</header>
<nav>
  <a href="../html/index.html">HOME</a> | <a href="../php/ourproducts.php">OUR PRODUCTS</a> | <a href="../php/cart.php">CART</a> | <a href="../html/about.html">ABOUT</a>
</nav>
<section class="center">
	<h1>CART</h1>
	<?php

// Set variables used to access the database. In this case, WAMP was used with phpMyAdmin.
$database = "teat";
$user = "root";
$pass = "";

// Attempt connection, if error print the error out.
$connection = new mysqli("localhost", $user, $pass, $database);

if ($connection->connect_error) {

    echo "<p>Could not connect to the " .
        "database: " . $connection->connect_error . "</p>\n";
    exit;
}

//Set value of name of the table.
$tName = "cart";

//Select all records from the table.
$sql = "SELECT * FROM $tName";
$result = $connection->query($sql);
	echo "<table class='items'>";
	for ($i=0; $i < $result->field_count; $i++)
{
    echo "<th>"; //Same thing with the header of the table

    $fields = $result->fetch_field();
    echo $fields->name;

    echo"</th>";
}

echo "<th>";
echo "";
 echo"</th>";
//Prints records
$i = $result->field_count;

while($row = $result->fetch_row()) {
    echo "<tr>";
    for ($j=0; $j<$i; $j++) {
        echo "<td class='items'>";
        echo $row[$j];
        echo "</td>";
    }
	 echo "<td class='items'><a style='color:white;' href='removefromcart.php?id=" . $row[0] . "'>Remove</a>";
    echo "</tr>";
}

echo "</table>";
?>
</section>
	
<footer>This "website" was made by Xhoni Robo. No copyright...pls.</footer>
</body>
</html>
