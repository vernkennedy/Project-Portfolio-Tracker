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