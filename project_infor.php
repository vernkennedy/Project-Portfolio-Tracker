<?php
//for logout
include 'project_inforPHPCODE.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="project_inforCSS.css" type="text/css" />
	</head>
	
	<h1 align="center"><?php print $projectName?> </h1>
	
	<body>
		<br><br>
			<div id="left">
				<h4>Business objective</h4><?php print $objective?>			
				<h4>Detailed description</h4><?php print $description?>	
			</div>
			
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