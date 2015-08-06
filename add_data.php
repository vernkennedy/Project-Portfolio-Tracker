<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))  
{
 // variables for input data
 $projectName = $_POST['projectName'];
 $projectType = $_POST['projectType'];
 $cost = $_POST['cost'];
 $duration = $_POST['duration'];
 $issues = $_POST['issues'];
 $completed = $_POST['completed'];
 $objective = $_POST['objective'];
 $description = $_POST['description'];
 // variables for input data

 // sql query for inserting project into database
 $sql_query = "INSERT INTO users(projectName,projectType,cost,duration,issues,completed,objective,description) VALUES('$projectName','$projectType','$cost','$duration','$issues','$completed','$objective','$description')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script>
  alert('Data Are Inserted Successfully ');
  window.location.href='index2.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 // sql query execution function
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Project</title>
		<link rel="stylesheet" href="add_dataCSS.css" type="text/css" />
	</head>
	
	<body>
		

			<div id="header">
			 <div id="content"></div>
			</div>
			<div id="body">
			 <div id="content">
			 <h2>Add your Project </h2>
			
				<button><a href="index2.php">back to main page</a></button>
						
				<form method="post">
					<table align="center" id="customers">
						
						
						<tr>
							<td>Project Name<br><input type="text" name="projectName" placeholder="ProjectName" required /></td>
						</tr>
						
						<tr>
						<td>Project Type<br>
							<input type="radio" name="projectType" placeholder="Current" value="Current" required/>Current Project
							<input type="radio" name="projectType" placeholder="Past" value="Past" required />Past Project
						</td>
						</tr>
						
						<tr>
							<td>Cost<br><input type="text" name="cost" placeholder="Cost" required /></td>
						</tr>
						
						<tr>
							<td>Duration<br><input type="text" name="duration" placeholder="Duration" required /></td>
						</tr>
						
						<tr>
							<td>Number of issues<br><input type="text" name="issues" placeholder="# of Issues" required /></td>
						</tr>
						
						<tr>
						<td>Completed(true of false)<br>
							<input type="radio" name="completed" placeholder="Completed" value="true" required/>Yes
							<input type="radio" name="completed" placeholder="Completed" value="false" required />Not completed
						</td>
						</tr>
						
						<tr>
							<td>Business Objective<br><input type="text" name="objective" placeholder="objective" required /></td>
						</tr>
						
						<tr>
							<td>Description<br><input type="text" name="description" placeholder="description" required /></td>
						</tr>
						
						<tr>
							<td><button type="submit" name="btn-save"><b>Save</b></button></td>
						</tr>
						
					</table>
				</form>
			 </div>
			</div>

	
	</body>
</html>