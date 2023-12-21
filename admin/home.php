<!DOCTYPE html>
<?php
	require_once 'session.php';
?>
<html lang = "eng">
	<head>
		<title>IMS</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">Home</div>
			<div class = "alert alert-success"><center><h3>Internship With SLT Digital Lab</h3></center></div>
			
			
			<div class = "alert alert-success"><center><h3>OBJECTIVES</h3></center></div>
			<center>
				<ul>
			
Enhance Business Value and Revenue <br>

Reduce inefficiencies and leakages <br>


Enhancing trust and openness <br>

Reduce energy consumption <br>

Connect digitally
			</ul>
		</center>
		<br /><br /><br />
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<nav class = "navbar-default" id = "footer">
		<label class = "navbar-brand pull-right">&copy; Internship portal management system  <?php echo date('Y', strtotime('+8 HOURS'))?></label>
		<label class = "navbar-brand ">SLT Digital Lab</label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
</html>