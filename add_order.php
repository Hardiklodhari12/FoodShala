<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: cust_login.php");
}
else {
$res=mysqli_query($con,"SELECT * FROM customer WHERE cust_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

		$user_id=$userRow['cust_id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['addCartBtn']))
            {
                $item_id = $_POST['item_id'];
                $rest_id = $_POST['rest_id'];
                $user_id = $_SESSION['user'];
                $item_name = $_POST['item_name'];
                $item_type = $_POST['item_type'];
                $item_price = $_POST['item_price'];
                    
                //$sql="insert into orders (cust_id, rest_id, item_name, item_type, item_price) values ($user_id', '$rest_id', '$item_name', '$item_type', '$item_price')";
                $sql="insert into orders (cust_id, rest_id, item_name, item_type, item_price) values ('$user_id', '$rest_id', '$item_name', '$item_type', '$item_price')";
                if($con->query($sql) === TRUE){
                    header( "refresh:1; url= cust_dashboard.php" );
                      $message = "Order Placed :)";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                  
                  }else{
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
            }
        }
    }
?>
    