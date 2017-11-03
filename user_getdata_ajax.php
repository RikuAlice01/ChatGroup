<?php
			session_start();
			if(!isset($_SESSION['regis'])){
				exit();
			}

			$loginname=$_SESSION['regis'];
		`sudo chmod 777 online`;
			touch("online/$loginname"); // for online keeping
			$str='';

// Count online users
// will list all filename touch within 2 seconds

			$n=`cd online;find . -name "*" -mmin 0.05`;
			
			$z=explode("\n",$n);
			$cnt=count($z);
			$on='';
			$cnts=0;
			for($a=0;isset($z[$a]);$a++){
					$d=trim($z[$a]);
					$d=str_replace('./','',$d);
						
					if($d=='ADMIN' or $d=='' or $d=='.') continue;
					if($d==$loginname) {$on .="<img src='img/online2.png' height='10' width='10' > $d<br>";	
										$cnts++; continue;}
											
					$on .="<img src='img/online.png' height='10' width='10' > $d<br>";	
					$cnts++;
			}
			if($on!='') {
						$on=substr($on, 0, -1); 
						$str .= "$on";
			} 
				
			echo "<b><font size=\"1\" color=#FFFFFF>User online: $cnts</font><br>";
			echo "<font size=\"1\" color=#505050>$str</b></font>";
		`sudo chmod 755 online`;
?>
