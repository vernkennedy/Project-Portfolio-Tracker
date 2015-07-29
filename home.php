<?php
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome - <?php print($userRow['user_email']); ?></title>
<style>
#heading{border-bottom:1px solid silver; padding:0px; position:fixed; width:100%; background:#f2f2f2; margin-left:-9px; top:-2px;}
button{border:1px solid silver; padding:10px; background:white; margin-left:1200px; border-radius:5px; position:fixed; bottom:615px;}
a{color:black; text-decoration:none; }
h2{text-align:center;}
#bodyContent{position:relative; top:100px;}
</style>

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