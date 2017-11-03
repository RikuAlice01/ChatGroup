<?php
// make pass dir if not exists
		if(!is_dir('pass')) {
			
	// keep register user and password
				`mkdir pass;chmod 700 pass`;
				`echo 'deny from all' > pass/.htaccess`;
		}
		if(!is_dir('online')) {
	// keep online status
				`mkdir online;chmod 700 online`;
				`echo 'deny from all' > online/.htaccess`;
		}
		if(!is_dir('ban')) {
	// keep ban status
				`mkdir online;chmod 700 ban`;
				`echo 'deny from all' > ban/.htaccess`;
		}

// ADMIN if not exists********************
		`sudo chmod 777 pass/`;
		if(!file_exists('pass/ADMIN.php')){
					if(isset($user)) unset($user);
					// add ADMIN with pass=1
					$p=md5('1');
					$str="<?php\n\$fullname='SitthichaiQ';\n\$pass='$p';\n?>";

					file_put_contents('pass/ADMIN.php',$str,FILE_APPEND);
		`sudo chmod 755 pass`;
		}
//*****************************************
		if(!file_exists('comment.txt')){
					file_put_contents('comment.txt','',FILE_APPEND);
			}
?>
