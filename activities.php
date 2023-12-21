<div id = "activities" class = "tab-pane fade">
	<img src = "images\calandar.png" class = "pull-left" height = "100" width = "100"/>
	<h2 class = "text-success pull-left">Internships</h2>
	<br style = "clear:both;"/>
	<hr style = "border-top:1px solid #000;"/>
	<h3 class = "text-primary"><?php echo date("M Y", strtotime("+8 HOURS"))?></h3>
	<br />
	<div id = "act_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>Job_name</th>
								<th>Job_Description</th>
								<th>Start</th>
								<th>End</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$act_query = $conn->query("SELECT * FROM `activity`") or die($conn->error);
							while($act_fetch = $act_query->fetch_array()){
							?>
							<tr>
								<td><h3><b><?php echo $act_fetch['title']?></b></h3></td>
								<td><h4><b><?php echo $act_fetch['description']?></b></h4></td>
								<td><b><?php echo "<label class = 'text-primary'>".date("M d, Y", strtotime($act_fetch['start']))."</label>"?></b></td>
								<td><b><?php echo "<label class = 'text-primary'>".date("M d, Y", strtotime($act_fetch['end']))."</label>"?></b></td>
								<td><center><a href = "student_login.php"?activity_id=<?php echo $act_fetch['activity_id']?>" class = "btn btn-primary"><span class=  "glyphicon glyphicon-edit"></span> Apply</a> </center></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
									
				</div>	
			</div>

	