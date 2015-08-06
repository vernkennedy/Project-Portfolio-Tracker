<?php
include 'homePHPCODE.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="homeCSS.css" type="text/css" />
		<title>welcome - <?php print($userRow['user_email']); ?></title>
	</head>

	<body>
		<div id="heading">
			<h2>Project Portfolio Tracker</h2>    
		</div>
			<button><a href="logout.php?logout=true">logout</a></button>
		
	   <div id="bodyContent"> 
			Welcome : <?php print($userRow['user_name']); ?>
	   </div>
	</body>
</html>