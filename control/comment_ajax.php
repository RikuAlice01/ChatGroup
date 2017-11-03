<?php
			session_start();
			
			if(!isset($_SESSION['regis'])){
				exit();
			}
			
		`sudo chmod 777 comment.txt`;
			$file = file_get_contents('../comment.txt', FILE_USE_INCLUDE_PATH);
			echo "<font size=\"1\" color=#808080>$file</font>";
		`sudo chmod 755 comment.txt`;

?>
