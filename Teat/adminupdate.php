<!doctype html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TEAT Update</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-image: url('testimgs/backgroundtest.jpg');">
<?php
$id = $_GET['id'];
if (isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $image = $_POST["image"];
	$type = $_POST["type"];
	$tags = $_POST["tags"];
// Database values
    $database = "teat"; // WAMP database was used
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
// Add an Update SQL command using data sent by user by the form. ID is specified by get method by the previous link
    $sql = "UPDATE $tName 
SET Name='$name',
    Description='$desc',
    Price='$price',
    Image='$image' ,
	Type='$type',
	Tags='$tags'
WHERE Id= $id";
	
    if ($result = $conn->query($sql)) {
        echo "<p>Successfully updated the record</p>";
        echo "<p><a href='admin.php'>Go Back</a> </p>";
    } else {
        echo "<p>Unable to update the record</p>";
        echo "<p><a href='admin.php'>Go Back</a> </p>";
    }
    $conn->close();

}
else {
    ?>
    <form method="post" action="adminupdate.php?id=<?php echo "$id" ?>">
    <p>Name: <input type="text" name="name"  /></p>
    <p>Description: <input type="text" name="desc" /></p>
    <p>Price: <input type="text" name="price"  /></p>
    <p>Image: <input type="text" name="image" /> </p>
    <p>Type: <input type="text" name="type" /> </p>
    <p>Tags: <input type="text" name="tags" /> </p>
    <p><input type="submit" name="Submit" value="Update" /></p>
</form>
<?php
}
?>
</body>

</html>