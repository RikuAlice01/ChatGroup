<?php
		if(isset($_SESSION['regis']) and $_SESSION['regis']=='ADMIN' and isset($_REQUEST['list'])){
				`sudo chmod 777 pass/`;
// Dispaly all user names

// find number of users

				echo "<center><div id='loginDisplay' style=\"height:400px; width:1000px;\">";
				echo "<center><font size=\"1\" color=\"white\"><b>Admin management:</b></font><br>";
				$n=`cd pass;ls -1 | sed 's/.php//g'`;		
				$user=explode("\n",$n);
				$cnt=count($user);
				echo "<table style='width:80%'>";
				
				isset($_REQUEST['loginname']) ? $loginname = $_REQUEST['loginname'] : $loginname = '';

				if($loginname!='ADMIN'){	
						echo "<tr><th>No.</th><th>User ID</th><th>Fullname</th><th>Edit</th></tr>";
				}

				for($x=0;isset($user[$x]);$x++){
							$loginname=trim($user[$x]);
							if($loginname=='') continue;
							$fname='pass/'.$loginname.'.php';
							include($fname);
							$linenum=$x+1;
							if($loginname!='ADMIN'){
									$edit="<a href=\"$thislink?edit=y&name=$loginname\">Edit</a>";
									$change_pass="<a href=\"$thislink?change_pas=y&name=$loginname\">Change Password</a>";
									$delete="<a href=\"$thislink?delete=y&name=$loginname\">Delete</a>";
						
									if(file_exists("ban/".$loginname)==$loginname){
											$ban="<a href=\"$thislink?unban=y&name=$loginname\">Unban</a>";
									}else{
											$ban="<a href=\"$thislink?ban=y&name=$loginname\">Ban</a>";
									}
									echo "<tr><td algin=center>$linenum</td><td>$loginname</td><td>$fullname</td><td><$edit> <$change_pass> <$ban> <$delete></td></tr>";
							}else{
									$edit="<a href=\"$thislink?edit=y&name=$loginname\">Edit</a>";
									$change_pass="<a href=\"$thislink?change_pas=y&name=$loginname\">Change Password</a>";
									$delete="<a href=\"$thislink?delete=y&name=$loginname\">Delete</a>";
									echo "<tr><td algin=center>$linenum</td><td>$loginname</td><td>$fullname</td><td><$edit> <$change_pass></td></tr>";			
							}
				}
			`sudo chmod 755 pass/`;
				echo"</table>";
				echo "<a href=\"$thislink?\">Back</a></center>";
				echo "</center></div>";
				exit();
	}
?>
