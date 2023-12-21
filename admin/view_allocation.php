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


<div class = "container-fluid"  >




<?php

// view_allocation.php
include 'db.php';

// Display form to select a supervisor
echo "<h2>Select Supervisor</h2>";
echo "<form action='view_allocation.php' method='post'>";
echo "<label for='supervisor_id'>Supervisor ID:</label>";
echo "<input type='text' name='supervisor_id' required>";
echo "<input type='submit' value='View Allocations'>";
echo "</form>";

// Display all allocations
$sql = "SELECT fill_details.id AS student_id, fill_details.first_name AS student_name, supervisors.firstname AS supervisor_name
        FROM fill_details
        LEFT JOIN supervisors ON fill_details.supervisor_id = supervisors.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>All Allocations</h2>";
    echo "<table border='1'>";
    echo "<tr><th><h4>Student ID</h4></th><th><h4>Student Name</h4></th><th><h4>Supervisor Name</h4></th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><b>{$row['student_id']}</b></td>";
        echo "<td><b>{$row['student_name']}</b></td>";
        echo "<td><b>{$row['supervisor_name']}</b></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No allocations found.";
}

// Display allocations for the selected supervisor
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedSupervisorId = $_POST['supervisor_id'];

    $sql = "SELECT fill_details.id AS student_id, fill_details.first_name AS student_name, supervisors.firstname AS supervisor_name
            FROM fill_details
            LEFT JOIN supervisors ON fill_details.supervisor_id = supervisors.id
            WHERE supervisors.id = $selectedSupervisorId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Allocations for Supervisor $selectedSupervisorId</h2>";
        echo "<table border='1'>";
        echo "<tr><th><h4>Student ID</h4></th><th><h4>Student Name</h4></th><th><h4>Supervisor Name</h4></th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><b>{$row['student_id']}</b></td>";
            echo "<td><b>{$row['student_name']}</b></td>";
            echo "<td><b>{$row['supervisor_name']}</b></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No allocations found for Supervisor $selectedSupervisorId.";
    }
}

$conn->close();
?>




</div>



		
	<nav class = "navbar-default" id = "footer">
		<label class = "navbar-brand pull-right">&copy; Internship portal management system  <?php echo date('Y', strtotime('+8 HOURS'))?></label>
		<label class = "navbar-brand ">SLT Digital Lab</label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
</html>































