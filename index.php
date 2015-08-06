
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="indexCSS.css" type="text/css" />

</head>
<body>
<div class="container">
    
        <form method="post">
            <legend><h2>Project Portfolio Tracker</h2></legend><br>
            <?php
			if(isset($error))
			{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                     </div>
                     <?php
			}
			?>
            <div class="form-group"><br>
            	Email<br><input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div><br>
			
            <div class="form-group">
            	Password<br><input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
            </div>
           
            <div><br>
            	<button type="submit" name="btn-login" id="signin">
                	&nbsp;Sign In
                </button>
				
				<button id="signup"><a href="sign-up.php">Sign Up</a></button>
            </div>
            
        </form>
		
		<!-- Php Code for form submission and redirect-->
		<?php
			include 'indexPHPCODE.php';
		?>
		
		
		
		
       
</div>

</body>
</html>