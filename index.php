
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login : cleartuts</title>
<style>
form{margin-left:28%;  width:40%; padding:25px;}
legend{background:#f2f2f2; width:99%; border:2px solid #f2f2f2;}
button{border:1px solid silver; padding:10px; background:white; border-radius:5px; position:fixed; }
a{color:black; text-decoration:none; }
h2{text-align:center;}
#signup{margin-left:80px;}
input{border:1px solid silver; border-radius:3px; padding:10px;}
form>div,form>h4{margin-left:30%;}
</style>
</head>
<body>
<div class="container">
    
        <form method="post">
            <legend><h2>ScotBoard</h2></legend><br>
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
			require_once 'databaseconfig.php';

			if($user->is_loggedin()!="")
			{
			 // prevents redirecting back to Home.php (my fix)
				$user->redirect('index2.php');
			}

			if(isset($_POST['btn-login']))
			{
				$uname = $_POST['txt_uname_email'];
				$umail = $_POST['txt_uname_email'];
				$upass = $_POST['txt_password'];
					
				if($user->login($uname,$umail,$upass))
				{
					$user->redirect('index2.php');
				}
				else
				{
					$error = "Wrong Details !";
				}	
			}
		?>
		
		
       
</div>

</body>
</html>