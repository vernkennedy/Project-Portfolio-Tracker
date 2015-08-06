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