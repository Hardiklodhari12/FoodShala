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
                    <a class="nav-link active" href="res_dashboard.php">Add Item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_orders.php">Orders</a>
                </li>
                &nbsp;
                <li class="nav-item">
        	        <p>Hi' <?php echo $userRow['r_nm']; ?></p><a class="nav-link" href="logout.php?logout">Logout</a>
                </li>   
            </ul>
        </div>
    </div>
</nav>

<!--Add Food -->
<main class="login-form">
    <div class="cotainer">
    <center><h1 class="h1-title">Add Item</h1></center>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Item Details</div>
                    <div class="card-body">
                        <form action="add_food.php" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Item Name<b>*</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="item_name" name="item_name" required/>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="item_name" class="col-md-4 col-form-label text-md-right">Item Image<b>*</b></label>
                                <div class="col-md-6">
                                    <input type="file" name="item_image" class="uploader" onchange="readURL(this);" required />
                                    <br><span class="text-muted" style="font-size: 14px;">JPG, GIF or PNG. Max size of 800K</span>
                                    <div class="preview-area">
                                        <img id="profileImg" src="" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="item_price" class="col-md-4 col-form-label text-md-right">Item Price<b>*</b></label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" id="item_price" name="item_price" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="item_desc" class="col-md-4 col-form-label text-md-right">Item Description<b>*</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="item_desc" name="item_desc" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sel"  class="col-md-4 col-form-label text-md-right">Preference</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="item_type" name="item_type">
                                    <option>Veg</option>
                                    <option>Non - Veg</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-additem">Add Item</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

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
		$('.uploader').on('click', function(){
			$('.preview-area').css({
				'display': 'block'
			});
		});

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profileImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>