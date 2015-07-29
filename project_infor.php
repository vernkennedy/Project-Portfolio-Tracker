<?php
//for logout
include_once 'databaseconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>




<?php
						 

								 // Create connection
		$myconnection = new mysqli("localhost", "root", "", "dbtuts");
		// Retrieve information from the database
		$myinformation = $myconnection->query("SELECT * FROM users WHERE user_id=".$_GET['infor_id']);

				 // output data of each record
				 while($record = $myinformation->fetch_assoc()) {
					
					$completed=$record["completed"]; //latitude				
					$projectName=$record["projectName"];
					$cost=$record["cost"];
					$duration=$record["duration"];
					$issues=$record["issues"];
					$objective=$record["objective"];
					$description=$record["description"];
					$projectType=$record["projectType"];
					$id=$record["user_id"];
				
					
				 }				 
								 
		  ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<link rel="stylesheet" href="tyle.css" type="text/css" />
</head>
<style>

#left{width:700px; height:500px; float:left; margin-left:150px;}
#right{width:300px; height:500px; float:right; margin-right:150px;}

h4{border:1px solid silver; border-radius:5px; padding:5px; background:#E3E3E3; border-bottom:1px solid silver;}
#right>h4,h1{border:0px solid silver; background:#E3E3E3;}
h1{position:fixed; margin-top:-8px; width:100%; margin-left:-8px; padding:8px; background:white; border-bottom:1px solid silver; }
button{border:1px solid silver; font-weight:bold; padding:10px; background:white; margin-left:280px; border-radius:5px; position:fixed; bottom:620px;}
button>a{color:black; text-decoration:none; }
#back{border:1px solid silver; font-weight:bold; padding:10px; background:white; margin-left:-700px; border-radius:5px; position:fixed; bottom:620px;}
#back>a		
</style>
<h1 align="center"><?php print $projectName?> </h1>
<body>

<br><br>
	<div id="left">
		<h4>Business objective</h4><?php print $objective?>
	
		<h4>Detailed description</h4><?php print $description?>	</div>
	
	<div id="right">
		<h4>Project category</h4><?php print $projectType?> project
		<h4>Estimated duration</h4><?php print $duration?> days
		<h4>Estimated cost</h4>$<?php print $cost?>
		<h4>Number of issues</h4><?php print $issues?>
	</div>

<button><a href="logout.php?logout=true">Log Out</a></button>
<button id="back"><a href="index2.php">&nbsp&nbsp&nbspBack&nbsp&nbsp&nbsp</a></button>


</body>
</html>