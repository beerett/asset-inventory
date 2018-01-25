<?php
function check($a) {
	if (isset($_GET['school'])) {
		$s = $_GET['school'];
		if (stripos($a,$s) !== false) { echo "checked "; return "checked";  }
	}
	}

	
?>
	
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['t'])) {
	if($_GET['t'] == "computer") { $t="computers";  }
	if($_GET['t'] == "projectors") { $t="projectors"; }
	if($_GET['t'] == "smartboards") { $t="smartboards"; }
	if($_GET['t'] == "apple") { $t="apple"; }
}

$con=mysqli_connect("localhost","user","pass","inventory");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if (isset($_GET['school'])) {
	$s = $_GET['school'];
	$result = mysqli_query($con,"SELECT * FROM `{$t}` WHERE school={$s}");
}

else  { 
	$query = "SELECT * FROM `{$t}`";
	$result = mysqli_query($con,$query); 

	
	}

	switch ($t) {
		case "computers" : {
			echo "<table width='100%' style='margin-top:10px;' width='100%' border='0' class='ui-widget ui-widget-content'><tr>
			<th class='ui-widget-header'>Asset #</th>
			<th class='ui-widget-header'>Employee</th>
			<th class='ui-widget-header'>Type</th>
			<th class='ui-widget-header'>Model</th>
			<th class='ui-widget-header'>Name</th>
			<th class='ui-widget-header'>Service Tag</th>
			<th class='ui-widget-header'>Express Code</th>
			<th class='ui-widget-header'>Site</th>
			<th class='ui-widget-header'>Room</th>
			<th class='ui-widget-header'>Dept</th>
			<th class='ui-widget-header'>Notes</th>
			<th class='ui-widget-header'>Agr</th></tr>";
			break;
		}
		case "projectors" : {
			echo "<table style='margin-top:10px;' width='100%' border='0' class='ui-widget ui-widget-content'><tr>
			<th class='ui-widget-header'>Asset #</th>
			<th class='ui-widget-header'>Model</th>
			<th class='ui-widget-header'>Room</th>
			<th class='ui-widget-header'>Lamp</th>
			<th class='ui-widget-header'>Lamp Date</th>
			<th class='ui-widget-header'>Notes</th>
			</tr>";
			break;
		}
		
		case "smartboards" : {
			echo "<table style='margin-top:10px;' width='100%' border='0' class='ui-widget ui-widget-content'><tr>
			<th class='ui-widget-header'>Asset</th>
			<th class='ui-widget-header'>Room</th>
			<th class='ui-widget-header'>Serial</th>
			<th class='ui-widget-header'>Site</th>
			<th class='ui-widget-header'>Notes</th>
			</tr>";
			break;
		}
		case "apple" : {
			echo "<table style='margin-top:10px;' width='100%' border='0' class='ui-widget ui-widget-content'><tr>
			<th class='ui-widget-header'>Asset</th>
			<th class='ui-widget-header'>Employee</th>
			<th class='ui-widget-header'>Room</th>
			<th class='ui-widget-header'>Version</th>
			<th class='ui-widget-header'>Notes</th>
			</tr>";
			break;
		}
	}






if($result === FALSE) { 
    print_r(mysql_error());
}

while($row = mysqli_fetch_array($result))
 
  switch ($t) {
		case "computers" : {
		// $img = base64_encode($row['agreement']);
		  echo "<tr class='rows'><td>".$row['asset'] . "</td>
		  <td> " . $row['employee']."</td>
		  <td> " . $row['type']."</td>
		  <td> " . $row['model']."</td>
		  <td> " . $row['name']."</td>
		  <td> " . $row['service tag']."</td>
		  <td> " . $row['expresscode']."</td>
		  <td> " . $row['site']."</td>
		  <td> ". $row['room']."</td>
		  <td> ". $row['dept']."</td>
		  <td> " . $row['notes']."</td>
		  <td><a href='#' class='agr' sqlid=".$row['id']."><img src='images/agr.png' ></td>
		  ";
		  //<td><img src='data:image/jpeg;base64,". $img ."' /></td></tr>"
		  break;
	  }
	  case "projectors" : {
		echo "<tr class='rows'><td>".$row['asset'] . "</td>
		  <td> " . $row['model']."</td>
		  <td> " . $row['room']."</td>
		  <td> " . $row['lamp']."</td>
		  <td> " . $row['lampdate']."</td>
		  <td> " . $row['notes']."</td>";
		  break;
	  }
	  case "smartboards" : {
		  echo "<tr class='rows'><td>".$row['asset'] . "</td>
			<td> " . $row['room']."</td>
			<td> " . $row['serial']."</td>
			<td> " . $row['site']."</td>
			<td> " . $row['notes']."</td>";
			break;
	  }
	  case "apple" : {
		 echo "<tr class='rows'><td>".$row['asset'] . "</td> 
			<td> " . $row['employee']."</td>
			<td> " . $row['room']."</td>
			<td> " . $row['version']."</td>
			<td> " . $row['notes']."</td>";
			break;
	  }
 }
echo "</table>";
mysqli_close($con);


?>
