<?php
		if(isset($_SESSION['regis'])){
// edit user data
		if(isset($_REQUEST['edit']) and isset($_SESSION['regis'])){
					`sudo chmod 777 pass`;
						$loginname=trim($_REQUEST['name']);
						if($_SESSION['regis']!='ADMIN' and $loginname == 'ADMIN')exit; 
						
						$fname='pass/'.$loginname.'.php';
						include($fname);
	// gen form to edit
						echo "<center><div id='loginDisplay' style=\"height:160px;\">";		
						echo "<center><table>";
						echo "<form autocomplete=\"off\" action=\"$thislink\" method=\"post\">\n";
				
						echo "<tr><th colspan=2>ID: $loginname</th></tr>";
				
						echo "<tr><td>Fullname:</td><td><input type=\"text\" name=\"fullname\" value=\"$fullname\"></td></tr>";
						echo "<input type=\"hidden\" name=\"name\" value=\"$loginname\">\n";	
						echo "<input type=\"hidden\" name=\"edit_data\" value=\"y\">\n";	
				
						echo "<tr><td align=right colspan=2><input type=\"submit\" name=\"submit\" value=\"Submit\"></td></tr>";
						echo "</form>";
				
						echo "</table>";
						echo "<a href=\"$thislink?list=y\">Back</a>";
						echo "</center></div>";
						exit();
		}
		
// take new edit user data
		if(isset($_REQUEST['edit_data']) and isset($_SESSION['regis'])){
				`sudo chmod 777 pass/`;
				$loginname=trim($_REQUEST['name']);
				if($_SESSION['regis']!='ADMIN' and $loginname == 'ADMIN')exit; 
				
				$fname='pass/'.$loginname.'.php';
				$newfullname=trim($_REQUEST['fullname']);

 
				if(file_exists($fname) and $newfullname!=''){
						include($fname);
						$str="<?php\n\$fullname='$newfullname';\n\$pass='$pass';\n?>";
						`sudo echo '' > $fname`;
						file_put_contents($fname,$str, FILE_APPEND | LOCK_EX);      
						echo "<center>Full name for User: $loginname is changed.<br>";
						echo "<a href=\"$thislink?list=y\">Back</a>";
						`sudo chmod 755 pass/`;
						exit();
				}else{
						$_REQUEST['edit']='y';
						`sudo chmod 755 pass/`;
				}
		}

// change user password
		if(isset($_REQUEST['change_pas']) and isset($_SESSION['regis'])){
			
				isset($_REQUEST['name']) ? $name = $_REQUEST['name'] : $name = '';			
	`sudo chmod 777 pass/`;
				$loginname=trim($_REQUEST['name']);
				if($_SESSION['regis']!='ADMIN' and $loginname == 'ADMIN')exit; 
				
				$fname='pass/'.$loginname.'.php';
				
				isset($_REQUEST['Newpass']) ? $Newpass = $_REQUEST['Newpass'] : $Newpass = '';
				isset($_REQUEST['Vnewpass']) ? $Vnewpass = $_REQUEST['Vnewpass'] : $Vnewpass = 'C';
				include($fname);
				
				echo "<form autocomplete=\"off\" action=\"$thislink?change_pas=y\" method=\"post\">\n";
				
		if(isset($_REQUEST['Newpass'])){
					if($Newpass==''){
							echo "<center><b><font size=\"1\" color=\"red\">New password is empty.</font></b></center><br>\n";
					}else{
							if($Newpass==$Vnewpass){
									echo "<center><b><font size=\"3\" color=#ffff00>New password...</font></b></center><br>\n";
									$pass=md5($Newpass);
									$str="<?php\n\$fullname='$fullname';\n\$pass='$pass';\n?>";
									`sudo echo '' > $fname`;
									file_put_contents($fname,$str, FILE_APPEND | LOCK_EX); 
									if($loginname==$_SESSION['regis']){
										if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
										}
									echo "<meta http-equiv=refresh content=2;URL='index.php'>";
															
							}else{
									echo "<center><b><font size=\"1\" color=\"red\">Password verify is fail.</font></b></center><br>\n";
							}
					}
		}		
		echo "<center><div id='loginDisplay' style=\"height:180px;\">";	
		echo "<center><table>";
		echo "<tr><td colspan=2> Fullname: $fullname</td></tr>";
		echo "<tr><td>New Password:</td>";
		echo "<td><input type=\"password\" name=\"Newpass\" pattern=\".{6,}\" title=\"Six or more characters\" value=\"\"></td></tr>";
				
		echo "<tr><td>Verify New Password:</td>";
		echo "<td><input type=\"password\" name=\"Vnewpass\" value=\"\"></td></tr>";
				
		echo "<input type=\"hidden\" name=\"name\" value=\"$loginname\">\n";	
		echo "<input type=\"hidden\" name=\"change_pas\" value=\"y\">\n";	
		echo "<tr><td  align=right  colspan=2><input type=\"submit\" name=\"submit\" value=\"Submit\">";
		echo "</td>";
						
		echo "</tr>";
		echo "</table>";
		echo "</form>";
		echo "<a href=\"$thislink?list=y\">Back</a></center>";
		echo "</center></div>";
	`sudo chmod 755 pass/`;
		exit();
		}
		}
?>
