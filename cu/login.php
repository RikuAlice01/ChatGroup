<?php

// login ******************************************

		if(isset($_REQUEST['name']) and isset($_REQUEST['pass']) and isset($_REQUEST['login'])){
			isset($_REQUEST['name']) ? $name=$_REQUEST['name'] : $name= '';

			if(file_exists("ban/".$name)==$name){
					echo "<br><font size=50px color=\"red\">User $name is BANNED.</font></br>\n";
					exit();
			}
			
			if(empty($_REQUEST['pass']) || empty($_REQUEST['name']))
					{
						echo "<center><b><font color=#FFAA00>You did not fill out the required fields.</font><br></b></center>";
					}
			
			unset($_SESSION['regis'],$_SESSION['fullname']);
			
			if(isset($_SESSION['login'])) unset($_SESSION['login']);
	// take submitted data
				$n=trim($_REQUEST['name']);
				$n=strtoupper($n);
				$p=trim($_REQUEST['pass']);
				if($n=='' or $p=='') {
		//if empty do nothing
						if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
						if(isset($_REQUEST['name'])) unset($_REQUEST['name']);
						if(isset($_REQUEST['fullname'])) unset($_REQUEST['fullname']);
						if(isset($_REQUEST['pass'])) unset($_REQUEST['pass']);
				}else{
						`sudo chmod 777 pass`;
						$fname='pass/'.$n.'.php';
						if(!file_exists($fname)){
								if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
								if(isset($_REQUEST['name'])) unset($_REQUEST['name']);
								if(isset($_REQUEST['fullname'])) unset($_REQUEST['fullname']);
								if(isset($_REQUEST['pass'])) unset($_REQUEST['pass']);
						}else{            
								include($fname);
								if($pass==''){
										echo "<font color=red>New password for userName: $n has set to $p</font><br>";
										$_SESSION['regis']=$n;
										$_SESSION['fullname']=$fullname;
										// write new pass to file
										$loginname=$n;
										$pass=md5($p);
										$str="<?php\n\$fullname='$fullname';\n\$pass='$pass';\n?>";
										file_put_contents($fname,$str, FILE_APPEND | LOCK_EX);    

								}elseif($pass!=md5($p)){
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
						`sudo chmod 755 pass`;
				}

		}
//********************************************

?>
