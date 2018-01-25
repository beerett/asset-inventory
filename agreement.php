<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['id'])) { 
	$id = $_GET['id'];
	$con=mysqli_connect("localhost","user","pass","inventory");
		// Check connection
		if (mysqli_connect_errno())
		  {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		if (isset($_GET['t'])) {
			$t = $_GET['t'];
			$query = "SELECT * FROM {$t} where id={$id}";
			$result = mysqli_query($con,$query); 
		}
		
		while($row = mysqli_fetch_array($result)) {
			echo base64_encode($row['agreement']);
		
		}
	}

?>