<?php 
	$database = "teat";
	$user = "root";
	$pass = "";
	if (isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$tName = "users";
		$connection = new mysqli("localhost", $user, $pass, $database);

		if ($connection->connect_error) {

			echo "<p>Could not connect to the " .
				"database: " . $connection->connect_error . "</p>\n";
			exit;
		}
		
		$sql = "SELECT Username, Password FROM $tName
		        WHERE Username='$username'";
        $result = $connection->query($sql);
		
		if(empty($result)) {
			echo '<script language="javascript">';
			echo 'alert("Username or Password is incorrect.")';
			echo '</script>';
		}
		else {
			$row = $result->fetch_row();
			$password = sha1($password);
			if ($username == "admin" && $password == $row[1]) {
				header("Location: admin.php");
				die();
			}
			else if ($password == $row[1]) {
				header("Location: testUIforTEAT.html");
				die();
			}
			else {
				echo '<script language="javascript">';
				echo 'alert("Username or Password is incorrect.")';
				echo '</script>';
			}
		}
	}
	?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TEAT Login</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url('testimgs/backgroundtest.jpg');">
	<div class="text-center">
		<h1>TEAT</h1>
		<h2>User Login</h2>
	</div>
	<div class="text-center">
		<form method="post" action="login.php">
			Username: <input type="text" name="username">&nbsp; <br/>
			Password: <input type="password" name="password"><br/> </span>
			<input type="submit" value="Login" class="btn-primary">
		</form>
	</div>
	
	<div class="text-center">
		<a href="newuser.php" class="active">New User?</a>
	</div>
</body>
</html>