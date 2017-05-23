<?php 
	$database = "teat";
	$user = "root";
	$pass = "";

	$connection = new mysqli("localhost", $user, $pass, $database);

if ($connection->connect_error) {

    echo "<p>Could not connect to the " .
        "database: " . $connection->connect_error . "</p>\n";
    exit;
}

//Set value of name of the table.
$tName = "cart";

//Select all records from the table.
$sql = "SELECT Image, Name, Price, Id FROM $tName";
$result = $connection->query($sql);
	
$i = $result->field_count;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TEAT - The way of the lazy</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
		.imgitem{
    
    max-width:100px;
	max-height:100px;
}
	</style>
</head>
<body style="background-image: url('testimgs/backgroundtest.jpg');">
<nav>
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">TEAT - The way of the lazy</a> </div>
    
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"> </li>
        <li> </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group"> </div>
</form>
      <ul class="nav navbar-nav navbar-right hidden-sm">
       <li><a href="teat.php">Home</a> </li>
       <li><a href="teatproducts.php">Products</a> </li>
       <li><a href="teatcart.php">Cart</a> </li>
       <li><a href="login.php">Log In</a> </li>
       <li><a href="newuser.php">Sign Up</a> </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carousel1" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"> </li>
            <li data-target="#carousel1" data-slide-to="1" class=""> </li>
            <li data-target="#carousel1" data-slide-to="2" class=""> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item"> <img class="img-responsive" src="img/home.jpg" alt="thumb">
              <div class="carousel-caption"> WE BRING YOU WHAT YOU NEED AT HOME </div>
            </div>
            <div class="item active"> <img class="img-responsive" src="img/christmas.jpg" alt="thumb">
              <div class="carousel-caption"> JOIN US NOW FOR SPECIAL CHRISTMAS RAFFLES  </div>
            </div>
            <div class="item"> <img class="img-responsive" src="img/dreams.png" alt="thumb">
              <div class="carousel-caption"> DON'T LET YOUR DREAMS BE DREAMS  </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
</div>
    <hr>
  </div>
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Fast" src="img/fast.jpg"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>FAST</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Smart" src="img/smart.png"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>SMART</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Efficient" src="img/efficient.png"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>EFFICIENT</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<h2 class="text-center">CART</h2>
<hr>
<div class="container">
  <div class="row text-center">
    
     <?php 
	  	while($row = $result->fetch_row()) {
    	
			?>  <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
      			<div class="thumbnail"> <img src="<?php echo $row[0]; ?>" alt="Thumbnail Image 1" class="img-responsive imgitem">
        		<div class="caption">
          		<h3><?php echo $row[1]; ?></h3>
          		<p>Price: $<?php echo $row[2]; ?></p>
          		<p><a href="teatremovecart.php?id=<?php echo $row[3]; ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Remove from Cart</a></p>
        		</div>
      			</div>
    			</div>
    	<?php
    }

	  ?>
	</div>
	</div>
	<div class="text-center"><a href="pay.php" style="background: white; padding: 5px; font-size: 3em;">Pay</a></div>

<hr>
  <div class="container well">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
        <div class="row">
<div class="col-sm-4 col-md-4 col-lg-4  col-xs-6">
          <div> </div>
          </div>
</div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-5"> 
        <address>
        <strong>TEAT Inc.</strong><br>
       Randonomova Street<br>
        2900 Blagoevgrad<br>
        <abbr title="Phone">Phone:</abbr> (359) 89-267-9018
      </address>
        <address>
        <strong>CEO: Xhoni Robo</strong><br>
        <a href="mailto:#">fakee@mail.com</a>
        </address>
        </div>
    </div>
  </div>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>This "website" was made by Xhoni Robo. No copyright...pls.</p>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>