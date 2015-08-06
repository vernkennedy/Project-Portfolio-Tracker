<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
 $sql_query="SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
 $result_set=mysql_query($sql_query);
 $fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
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
 // sql query for update data into database
 $sql_query = "UPDATE users SET projectName='$projectName',projectType='$projectType',cost='$cost' ,duration='$duration',issues='$issues',completed='$completed',objective='$objective',description='$description' WHERE user_id=".$_GET['edit_id'];
 // sql query for update data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script>
  alert('Data Are Updated Successfully');
  window.location.href='index2.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index2.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>edit data</title>
		<link rel="stylesheet" href="edit_dataCSS.css" type="text/css" />
	</head>
	
	<body>
	
			<div id="header">
			 <div id="content">
				<h2>Edit your data </h2>
			 </div>
			</div>

			<div id="body">
			 <div id="content">
				<form method="post">
					<table align="center">
						<tr>
							<td>Project Name<br><input type="text" name="projectName" placeholder="Project" value="<?php echo $fetched_row['projectName']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>Project Type<br>
							<input type="radio" name="projectType" placeholder="Current" value="Current" required/>Current Project
							<input type="radio" name="projectType" placeholder="Past" value="Past" required />Past Project	</td>
						</tr>
						
						<tr>
							<td>Cost<br><input type="text" name="cost" placeholder="Cost" value="<?php echo $fetched_row['cost']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>Duration<br><input type="text" name="duration" placeholder="Duration" value="<?php echo $fetched_row['duration']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>Number of issues<br><input type="text" name="issues" placeholder="Issues" value="<?php echo $fetched_row['issues']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>Completed (true or false)<br>
							<input type="radio" name="completed" placeholder="Completed" value="true" required/>Yes
							<input type="radio" name="completed" placeholder="Completed" value="false" required />Not completed
							</td>
						</tr>
						
						<tr>
							<td>Business Objective<br><input  rows="4" cols="50"type="text" name="objective" placeholder="Objective" value="<?php echo $fetched_row['objective']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>Description<br><input type="text" name="description" placeholder="Description" value="<?php echo $fetched_row['description']; ?>" required /></td>
						</tr>
						
						<tr>
							<td>
							<button type="submit" name="btn-update"><strong>Update</strong></button>
							<button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
							</td>
						</tr>
					</table>
				</form>
			 </div>
			</div>
		
	</body>
</html>