<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {

} 

if (isset($_GET['id'])) { 
	
	$id = $_GET['id'];
	$con=mysqli_connect("localhost","user","pass","inventory");
	
	// Check connection
	
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	else  { 
		if (isset($_GET['newemp'])) { 
			$e = $_GET['newemp']; 
			$query = "UPDATE computers SET employee='$e' where id='$id'"; 
			$result = mysqli_query($con,$query); 
			if ($result) {
				$query = "INSERT into logs ";
				$sql = "INSERT INTO logs (date, username, action)
VALUES ('John', 'Doe', 'john@example.com')";

				$result = mysqli_query($con,$query);
			
			}
			
		}
		//$query = "SELECT * FROM `{$t}`";
		else { echo 'no employee id given'; }

	}
}


?>