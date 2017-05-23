<?php 
if (isset($_POST['Submit'])) {
	
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $email = $_POST["email"];
	$errorCount = 0;
	$userError = "";
	$password1Error = "";
	$password2Error = "";
	$emailError = "";
	
	//Function to trim and clean data. Used for testing later
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

	
	if (empty($_POST["user"])) {
		$userError = "Username is required";
		$errorCount++;
	} else {
		$user = test_input(($_POST["user"]));
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z' -]*$/", $user)) {
			$userError = "Only letters and white space allowed";
			$errorCount++;
		}
    }
	if (empty($pass)) {
		$password1Error = "Password is required";
		$errorCount++;
	}
	if (empty($pass2)) {
		$password2Error = "Repeated Password is required";
		$errorCount++;
	}
    if ($pass != $pass2) {
        $password2Error = "Passwords don't match";
        $errorCount++;
    }
	
	if (empty($_POST["email"])) {
		$emailError = "Email is required";
		$errorCount++;
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address syntax is valid or not
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			$emailError = "Invalid email format";
			$errorCount++;
		}
	}

	if ($errorCount > 0) {
		echo '<script language="javascript">';
		?>alert("The following errors occured:\n" * <?php echo($userError); ?>);  <?php
		echo '</script>';
	}
else {

// Database values
    $database = "teat"; // WAMP database was used
    $userdb = "root";
    $passdb = "";
// Try to connect
    $conn = new mysqli("localhost", $userdb, $passdb, $database);
    if ($conn->connect_error) {
        echo "<p>Could not connect to the $database " .
            "database: " . $conn->connect_error . "</p>\n";
        exit;
    }
    $tName = "users";
	
	$pass = sha1($pass);
    $sql = "INSERT INTO $tName (Username, Password, Email, Settings)
			VALUES ('$user', '$pass', '$email', 'read')";
	
	 if ($result = $conn->query($sql)) {
        $conn->close();
	
		header("Location: login.php");
				die();
		 
    } else {
		 $conn->close();
        echo "<p>Unable to complete sign up process.</p>";
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
<title>TEAT Sign up</title>

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
		input {
			float: right;
		}
	</style>
</head>
<body style="background-image: url('testimgs/backgroundtest.jpg');">
<h1 class="text-center">Sign up</h1>
<div style="margin-left: 35%; margin-right: 35%">
	<form method="post" action="newuser.php"/>
    <p>Username: <input type="text" name="user"  /></p>
    <p>Password: <input type="password" name="pass" /></p>
    <p>Repeat Password: <input type="password" name="pass2"  /></p>
    <p>Email: <input type="text" name="email" /> </p>
    
    <p><input type="submit" name="Submit" value="Sign Up" class="btn btn-default"/></p>
</form>
	</div>
</body>
</html>