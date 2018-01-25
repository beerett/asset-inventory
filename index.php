<?php 
		//setcookie("color","red");
		//echo $_COOKIE["color"];
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
	
		<title>Tech Inventory</title>
		<link rel="stylesheet" href="css/uniform.aristo.min.css" media="screen" />
		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<link type="text/css" href="css/black-tie/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="js/jquery.uniform.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/base.js"></script>
		<link type="text/css" href="css/base.css" rel="stylesheet" />	
		<script type="text/javascript">
			
		</script>
	</head>
	<body>
	
	<div id="main">
		<div id='format'>
			<input type='checkbox' group='fs' id='filterdo'><label for='filterdo'>District Office</label>
			<input type='checkbox' group='fs' id='filterhs'><label for='filterhs'>High School</label>
			<input type='checkbox' group='fs' id='filterms'><label for='filterms'>Middle School</label>
			<input type='checkbox' group='fs' id='filterfp'><label for='filterfp'>FP</label>
			<input type='checkbox' group='fs' id='filtermm'><label for='filtermm'>MM</label>
			<input type='checkbox' group='fs' id='filterall'><label for='filteral'>All</label>
			 <span id='un'></span>
			<input type='text' value='' id='filter'></input>
		</div>
	  <ul>
		<li><a id='tabComputers' href="fetch.php?t=computer">Computers</a></li>
		<li><a href="fetch.php?t=projectors">Projectors</a></li>
		<li><a href="fetch.php?t=smartboards">Smartboards</a></li>
		<li><a href="fetch.php?t=apple">iPads/iPods</a></li>
		<li><a href="log.php?list">Log</a></li>
	  </ul>
	  <span id='totals'>Total Computers : <span id='totalc'></span></span>
	  
	  <span id='buttons' style='margin-left:10px; padding-top:8px; float:left;'>
		<button id='btnDelete'>Delete</button>
		<button id='btnAdd'>Add</button>
		<button id='btnOwner'>Transfer</button>
	  </span>

	</div>
	
	
	
	
	
	<div id='agreement' title='User Agreement'>
		<img src='' />
	</div>
	
	
	<div id='transfer' title='Transfer Owner'>
		Previous Owner: <span id='prevowner'></span> 
		<input id='newemp' type='text'></input> 
		<button id='ownsub'>Save</button>
	</div>
	
	<div id='edit' title='Edit Row'>

	<label for='newasset'>Asset Tag:</label> <input id='newasset' type='text'></input> <br>
	<label for='newemployee'>Employee: <input id='newemployee' type='text'></input> <br>
	<label for='newtype'>Type: <input id='newtype' type='text'></input> <br>
	<label for='newmodel'>Model: <input id='newmodel' type='text'></input> <br>
	<label for='newname'>Name: <input id='newname' type='text'></input> <br>
	<label for='newservicetag'>Service Tag: <input id='newservicetag' type='text'></input> <br>
	<label for='newexpress'>Express Tag: <input id='newexpress' type='text'></input> <br>
	<label for='newsite'>Site: <input id='newsite' type='text'></input> <br>
	<label for='newroom'>Room: <input id='newroom' type='text'></input> <br>
	<label for='newdept'>Department: <input id='newdept' type='text'></input> <br>
	<label for='newnotes'>Notes: <input id='newnotes' type='text'></input> <br>
		<button id='newsub'>Save</button>
	</div>

	<ul class='rightclick'>
		  <li data-action = "transfer">Transfer</li>
		  <li data-action = "edit">Edit</li>
		  <li data-action = "update">Update</li>
		  <li data-action = "etc">Etc</li>
	</ul>
	
	
	
	<div id='login' title='Login'>
	
		<input id='username'></input>
		<button id='loginsave'>Login</button>
	</div>

	</body>
</html>