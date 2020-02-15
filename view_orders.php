<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['res']))
{
	header("Location: res_login.php");
}
$res=mysqli_query($con,"SELECT * FROM restaurant WHERE rest_id=".$_SESSION['res']);
$userRow=mysqli_fetch_array($res);
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <img class="navbar-brand" src="images/logo.png" id="logo_custom" width="10%" alt="logo" onclick="window.location.href = 'res_dashboard.php';">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="res_dashboard.php">Add Item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="view_orders.php">Orders</a>
                </li>
                &nbsp;
                <li class="nav-item">
        	        <p>Hi' <?php echo $userRow['r_nm']; ?></p><a class="nav-link" href="logout.php?logout">Logout</a>
                </li>    
            </ul>
        </div>
    </div>
</nav>

<!-- View Orders -->
<?php 
    include_once 'dbconnect.php';
    $restid = $_SESSION['res'];
	$sql = "select orders.* ,customer.uname from orders, customer where rest_id = '$restid' And orders.cust_id=customer.cust_id";
	$result = $con->query($sql) or die($con->error);
?>
	    <div class="content"><br>
	        <?php 
	        	while ($row = $result->fetch_assoc()) { ?>
	        		<div class="card">
						    <div class="card-body">
						    	<div class="card-text" >Customer - <?php echo ucwords($row['uname']); ?></div>
						    	<div class="card-text">Food Item - <?php echo $row['item_name']; ?></div>
						        <div class="card-text">Type - <?php echo $row['item_type']; ?></div>
						        <div class="card-text">Price - <?php echo $row['item_price']; ?></div>
						    </div>
						</div><hr>
	        <?php } ?>
        </div>
  
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>