<?php
		if(isset($_SESSION['regis']) and $_SESSION['regis']=='ADMIN'){
			
//delete user
		if(isset($_REQUEST['delete']) and isset($_SESSION['regis']) and $_SESSION['regis']=='ADMIN' ){
			`sudo chmod 777 pass/`;
			`sudo chmod 777 online/`;
				$loginname=trim($_REQUEST['name']);
				$fname='pass/'.$loginname.'.php';
				include($fname);
				echo "<font size=10px color=red><center>ID: $loginname $fullname is deleted.</font><br>";
				unlink($fname);
				$fname='online/'.$loginname;
				unlink($fname);
			`sudo chmod 755 pass/`;
			`sudo chmod 755 online/`;
				echo "<script type='text/javascript'>history.back();</script>";
				exit();
		}

// Ban user
		if(isset($_REQUEST['ban']) and isset($_SESSION['regis']) and $_SESSION['regis']=='ADMIN' ){
			`sudo chmod 777 ban/`;
			$loginname=trim($_REQUEST['name']);
			touch("ban/$loginname"); // for online keeping
			`sudo chmod 755 ban/`;
			echo "<script type='text/javascript'>history.back();</script>";
			exit();
			}
			
// UnBan user
		if(isset($_REQUEST['unban']) and isset($_SESSION['regis']) and $_SESSION['regis']=='ADMIN' ){
			`sudo chmod 777 ban/`;
			$loginname=trim($_REQUEST['name']);
			unlink("ban/$loginname"); // for online keeping
			echo "<script type='text/javascript'>history.back();</script>";
			`sudo chmod 755 ban/`;
			exit();
			}
		}
?>
