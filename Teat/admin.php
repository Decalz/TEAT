<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TEAT Admin</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
		td,tr,th {
			padding: 5px;
		}
		a {
			text-decoration: none;
		}
	</style>
</head>
<body style="background-image: url('testimgs/backgroundtest.jpg');">
<div class="text-center">
		<h1>TEAT</h1>
		<h2>Admin Page</h2>
	</div>
	<div style="margin-left: 5%;">
	<form method="get" action="admin.php">
		Search: <input type="text" name="name">
		<select name="searchwut">
			<option value="Name">Name</option>
  			<option value="Type">Type</option>
  			<option value="Tags">Tags</option>
		</select>
		<input type="submit" value="Go">
	</form>
	<br/>
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
$tName = "product";
		
if (!isset($_GET['name']) || ($_GET['name'] == "")) {
//Select all records from the table.
$sql = "SELECT * FROM $tName";
$result = $connection->query($sql);
echo "<table border='1'>"; //Echoes table so that it is used by html
for ($i=0; $i < $result->field_count; $i++){
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
        if ($j == 4) {
			echo "<td>";
       ?> <img src="<?php echo $row[4];?>" alt="Image" height="42" width="42"><?php
        echo "</td>";
		}
		else {
			echo "<td>";
        echo $row[$j];
        echo "</td>";
		}
    }
    echo "<td><a href='admindelete.php?id=" . $row[0] . "'>Delete</a>&nbsp;<a href='adminupdate.php?id=" . $row[0] . "'>Update</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
<p>
    &nbsp;<a href="admininsert.php">Insert New Product</a>
    
    <a style="float:right; margin-right: 5%;" href="teat.php">Go to main page</a>
</p>
</div>
<?php
}
		else{
				$name = $_GET['name'];
			    $search = $_GET['searchwut'];
			
				$sql = "SELECT * FROM $tName
				       WHERE $search LIKE '%$name%'";
			
$result = $connection->query($sql);
			
echo "<table border='1'>"; //Echoes table so that it is used by html
for ($i=0; $i < $result->field_count; $i++){
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
        if ($j == 4) {
			echo "<td>";
       ?> <img src="<?php echo $row[4];?>" alt="Image" height="42" width="42"><?php
        echo "</td>";
		}
		else {
			echo "<td>";
        echo $row[$j];
        echo "</td>";
		}
    }
    echo "<td><a href='admindelete.php?id=" . $row[0] . "'>Delete</a>&nbsp;<a href='adminupdate.php?id=" . $row[0] . "'>Update</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
<p>
    &nbsp;<a href="admininsert.php">Insert New Product</a>
    
    <a style="float:right; margin-right: 5%;" href="testUIforTEAT.html">Go to main page</a>
</p>
</div>
<?php
			
		}
$connection->close();
?>

</body>
</html>