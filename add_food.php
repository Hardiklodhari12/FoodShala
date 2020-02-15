<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['res']))
{
	header("Location: res_login.php");
}
else {
$res=mysqli_query($con,"SELECT * FROM restaurant WHERE rest_id=".$_SESSION['res']);
$userRow=mysqli_fetch_array($res);

		$res_id=$userRow['rest_id'];

	    if ($_SERVER["REQUEST_METHOD"] == "POST"){
	    	if(isset($_POST['btn-additem'])){
	    		$item_name=$_POST['item_name'];
	    		$item_desc=$_POST['item_desc'];
	    		$item_type=$_POST['item_type'];
	    		$item_price=$_POST['item_price'];
	    		$filename = date('Y_m_d_H_i_s_').$_FILES['item_image']['name'];
		        $type = $_FILES['item_image']['type'];
		        $tmp_name = $_FILES['item_image']['tmp_name'];
		        $size = $_FILES['item_image']['size'];
		        $location = "uploads/";
		        $filepath = $location.$filename;

		        if($type == "image/gif" || $type == "image/jpeg" || $type="image/png" || $type="image/jpg"){ 
			        if(move_uploaded_file($tmp_name, ''.$location.$filename)){
			            $sql="insert into food_item (rest_id, item_name, item_img, item_price, item_desc, item_type) values ('$res_id', '$item_name', '$filepath', '$item_price', '$item_desc', '$item_type')";
			            if($con->query($sql) === TRUE){
						  header( "refresh:1; url= res_dashboard.php" );
							$message = "Food Added :)";
							echo "<script type='text/javascript'>alert('$message');</script>";
						
			            }else{
			              echo "Error: " . $sql . "<br>" . $con->error;
			            }
			        }else{
			            echo "Failed to Upload";
			        } 
			    }else{
			        echo "File should be in jpg or png Format";
		        }
	    	}
        }
    }
?>