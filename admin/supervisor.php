<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
<html lang = "eng">
	<head>
		<title>intern msu </title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Supervisors</div>
				<a href="" data-toggle = "modal" data-target = "#add_supervisor"  class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add New Supervisor</a>
				<button style = "display:none;" type = "button" id = "cancel_supervisor" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "a_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									
									<th>Firstname</th>
									<th>Lastname</th>
                                    
                                    <th>Email</th>
                                    <th>Gender</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$a_query = $conn->query("SELECT * FROM `supervisors`") or die($conn->error);
									while($a_fetch = $a_query->fetch_array()){
										
								?>
								<tr>
									
                                    <td><?php echo $a_fetch['firstname']?></td>
                                    <td><?php echo $a_fetch['lastname']?></td>
									
                                    <td><?php echo $a_fetch['email']?></td>
									<td><?php echo $a_fetch['gender']?></td>
									<td><center><a href="" data-toggle = "modal" data-target = "#edit_supervisor"  class = "btn btn-primary">Update</a> <a href = "#" name = "<?php echo $a_fetch['id']?>" data-toggle = "modal" data-target = "#delete_admin" class = "btn btn-danger id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_admin" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<!-- <div id = "add_supervisor" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Supervisor/Add new</div>
							<div style = "width:40%; margin-left:32%;">	 -->
							
							
				<!-- .......model-assign supervisor.... -->

	<div class="modal" id="add_supervisor" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Intern-Supervisors</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h2>Add Supervisor</h2>
    <form action="add_supervisor.php" method="post">
    
    
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
<br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
<br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
<br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
<br>
        <button type="submit">Add Supervisor</button>
    </form>





      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
				<!-- .......model-assign supervisor end.... -->

<!-- .......model-update supervisor.... -->

<div class="modal" id="edit_supervisor" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Intern-Supervisors</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h2>Update Supervisor</h2>
    <form action="edit_supervisor.php" method="post">
    <label for="update_id">Supervisor ID to Update:</label>
    <input type="text" id="update_id" name="update_id" required>
    
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
<br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
<br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
<br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
<br>
        <button type="submit">Update Supervisor</button>
    </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
				<!-- .......model-update supervisor end.... -->





							</div>	
					</div>
				</div>
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
		<label class = "navbar-brand pull-right">&copy; Internship portal management system <?php echo date('Y', strtotime('+8 HOURS'))?></label>
		<label class = "navbar-brand ">SLT Digital Lab</label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$admin_id = $(this).attr('name');
			console.log($admin_id)
			$('.delete_admin').on('click', function(){
				window.location = 'delete_student_detail.php?id=' + $admin_id;
			});
		});
	});
</script>
</html>