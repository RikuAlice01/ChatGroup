<?php

// register *******************************
		if(isset($_REQUEST['name']) and isset($_REQUEST['pass']) and isset($_REQUEST['regis'])){

			isset($_REQUEST['name']) ? $name=$_REQUEST['name'] : $name= '';
			if(file_exists("ban/".$name)==$name){
				echo "<br><font size=50px color=\"red\">User $name is BANNED.</font></br>\n";
				exit();
			}
			
			if(empty($_REQUEST['name']) || empty($_REQUEST['pass'])||$_REQUEST['fullname'])
					{
						echo "<center><b><font color=#FFAA00>You did not fill out the required fields.</font></b><br></center>";
					}
						
		// take submitted data
				$n='';
				$n=trim($_REQUEST['name']);
				$fullname=trim($_REQUEST['fullname']);
				$p=trim($_REQUEST['pass']);
				
				$n=strtoupper($n);
				
				if($n=='' or $p=='' or $fullname=='') {
		//if empty do nothing
					if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
					if(isset($_REQUEST['name'])) unset($_REQUEST['name']);
					if(isset($_REQUEST['fullname'])) unset($_REQUEST['fullname']);
					if(isset($_REQUEST['pass'])) unset($_REQUEST['pass']);
					$_REQUEST['newregit']='y';
				}

				else{
					if(isset($user)) unset($user);
					`sudo chmod 777 pass`;
					$fname='pass/'.$n.'.php';
							if(!file_exists($fname)){
		
			// add new user
								$p=md5($p);
								$str="<?php\n\$fullname='$fullname';\n\$pass='$p';\n?>";
						
								`sudo chmod 777 pass`;
								file_put_contents($fname,$str, FILE_APPEND | LOCK_EX);
								`sudo chmod 755 pass`;
						
								$_SESSION['regis']=$n;
								$_SESSION['fullname']=$fullname;
							}else{            
								include($fname);
								if($pass!=md5($p)){
			// not same pass			
										echo "<center><font color=red>Name: $n exists.</font><br>";
										echo "If you try to register,choose a new name.<br>";
										echo "If you try to login,give new password.<br>";
										echo "<a href=\"$thislink\">Back</a></center>";
										exit();
								}else{				
										$_SESSION['regis']=$n;
										$_SESSION['fullname']=$fullname;
						}
					}
				}`sudo chmod 755 pass`;
		}
//********************************************

?>
