<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['list'])) {
	$con=mysqli_connect("localhost","user","pass","inventory");

	$query = "SELECT * from log";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($result)) {
	
	echo "<tr><td>".$row['date']."</td><td>".$row['username']."</td><td>".$row['action']."</td></tr>";
		
	
	}

}
elseif (isset($_GET['username']) && isset($_GET['action']) ) { 
	$username = $_GET['username'];
	$action = $_GET['action'];
	$con=mysqli_connect("localhost","user","pass","inventory");
	$query = "INSERT INTO log (date,username,action) VALUES (now(),'$username', '$action')";
	$result = mysqli_query($con,$query);
			
}
			
?>