<?php
session_start();
if(isset($_SESSION['res'])!="")
{
	header("Location: res_dashboard.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$rname = mysqli_real_escape_string($con,$_POST['rnm']);
	$remail = mysqli_real_escape_string($con,$_POST['email']);
    $rpass = md5(mysqli_real_escape_string($con,$_POST['pass']));
	
	if(mysqli_query($con,"INSERT INTO restaurant(r_nm,r_email,r_pass) VALUES('$rname','$remail','$rpass')"))
	{
		?>
        <div class="alert alert-success" role="alert">
            <strong>Account Registered </strong> 
        </div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-success" role="alert">
            <strong>Error While Registration</strong> 
        </div>
        <?php
	}
}
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
    <img class="navbar-brand" src="images/logo.png" id="logo_custom" width="10%" alt="logo" onclick="window.location.href = 'index.php';">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Restaurant Registration -->
<main class="login-form">
    <div class="cotainer">
    <center><h1 class="h1-title">Restaurant Registration</h1></center>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registration</div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Restaurant Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="rnm" class="form-control" name="rnm" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="pass" class="form-control" name="pass" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-signup">Register</button>
                               <br> 
                               <h6>
                                    Already have Account?&nbsp; <button type="button" class="btn btn-primary" onclick="window.location.href = 'res_login.php';">Login</button>
                                </h6>
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
</body>
</html>