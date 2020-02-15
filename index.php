<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <img class="navbar-brand" src="images/logo.png" id="logo_custom" width="10%" alt="logo" onclick="window.location.href = 'index.php';">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cust_login.php">Customer</a>
                        <a class="dropdown-item" href="res_login.php">Restaurant</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Register
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cust_registration.php">Customer</a>
                        <a class="dropdown-item" href="res_registration.php">Restaurant</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Menu -->
<br>
<?php 
	include_once 'dbconnect.php';
	$sql = "select food_item.*, restaurant.r_nm from food_item, restaurant where food_item.rest_id=restaurant.rest_id";
	$result = $con->query($sql) or die($con->error);
?>
<a name="menu"></a>
<section class="menu_list mt-60 mb-60">
	<div class="container">
		<div class="row">
		   <div class="col-xl-12">
			  <div class="section-title text-center mb-60">
				 <p>Good Food Good Life</p>
				 <h4>Menu</h4>
			  </div>
		   </div>
		</div>	
	
<?php
	while($row = $result->fetch_assoc()){ ?>
		<div class="row">
		   <div class="tab-content col-xl-12" id="myTabContent">
			  <div class="tab-pane fade active show" id="veg" role="tabpanel" aria-labelledby="veg-tab">
				 <div class="row">
					<div class="col-md-6">
					   <div class="single_menu_list">
						  <img src="<?php echo $row['item_img']; ?>" alt="">
						  <div class="menu_content">
							 <h4><?php echo ucwords($row['item_name']); ?><span><?php echo '₹'.$row['item_price']; ?></span></h4>
							 <p><?php echo ucfirst($row['item_type']); ?></p>
							 <p><?php echo ucfirst($row['item_desc']); ?></p>
							 <p>Restaurant Name - <?php echo ucwords($row['r_nm']) ?></p>
							 <a class="btn  btn-info pull-right orderBtn" href="javascript:void(0);" >Order</a>
						  </div>
					   </div>
					</div>
				 </div>
			  </div>
			  <?php } ?>
		</div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="page-footer font-small ble">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://github.com/Hardiklodhari12">Hardik Lodhari</a>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
$('.orderBtn').on('click', function(){
	alert('Order Food, Login & Get Your Favourite Food');
});
</script>
</body>
</html>