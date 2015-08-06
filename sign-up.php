<?php
include 'signupPHPCODE.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sign up</title>
		<link rel="stylesheet" href="signupCSS.css" type="text/css"  />
	</head>

	<body>
		<div class="container">
				<div class="form-container">
					<form method="post">
						<h2>Sign up.</h2>
						<?php
						if(isset($error))
						{
							foreach($error as $error)
							{
								 ?>
								 <div class="alert alert-danger">
									<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
								 </div>
								 <?php
							}
						}
						else if(isset($_GET['joined']))
						{
							 ?>
							 <div class="alert alert-info">
								  <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
							 </div>
							 <?php
						}
						?>
						<div class="form-group">
							<input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
						</div>
						
						<div class="clearfix"></div><br>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary" name="btn-signup">
								<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
							</button>
						</div>
						<br/>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>have an account ! <a href="index.php">Sign In</a></label>
					</form>
				</div>
		</div>
	</body>
</html>