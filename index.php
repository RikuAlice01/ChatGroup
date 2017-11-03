<?php
		session_start();
		$thislink=$_SERVER["PHP_SELF"]; // index.php
/*
* Chat Realtime
* By Sitthichai & Kirat
* 2017/01/38 05:00:00
*/

		echo"<head>";
		echo"<title>Chat Realtime</title>";
		echo"<link rel=\"icon\" href=\"img/icon2.png\" type=\"image/x-icon\">";
		echo"</head>";
		echo "<center>";
		echo "<img src='img/icon1.png' height='90' width='90'style=\"margin: 8px 0;\" >";
		 
		include ('styles.css');
						echo "<font size=1px color=#DDDDDD><center>Power by Sitthichai & Kirati</center></font>";
		include ('start/begin.php');
		include ('cu/login.php');
		include ('cu/reg.php');
		
// Start***************************************************

		echo "<font size=\"1\" color=#CCCCCC>";
		isset($_REQUEST['newregit'])?$newregit=$_REQUEST['newregit']:$newregit='';
		if(isset($_REQUEST['newregit'])){
					if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
					if(isset($_REQUEST['name'])) unset($_REQUEST['name']);
					if(isset($_REQUEST['fullname'])) unset($_REQUEST['fullname']);
					if(isset($_REQUEST['pass'])) unset($_REQUEST['pass']);
						echo "<center><div id='loginDisplay' style=\"height:250px;\">";
														
	// gen registeration form
				echo "<br>:: New registeration ::<br>\n";
				echo "<form autocomplete=\"off\" action=\"$thislink\" method=\"post\">\n";
					echo "<table style='width:20%'>";
							echo "<tr><td>ID: </td>";
								echo "<td><input type=\"text\" pattern=\"(?=.*[BMDbmd])(?=.*\d).{8}\" title=\"Must contain at Student ID\" name=\"name\" placeholder=\"B5XXXXXX\"><br></td></tr>";
		
							echo "<tr><td>FullName: </td>";
								echo "<td><input type=\"text\" placeholder=\"Fullname\" name=\"fullname\"><br></td></tr>";
							echo "<tr><td>Pass: </td>";
								echo "<td><input type=\"password\" pattern=\".{6,}\" title=\"Six or more characters\" placeholder=\"**********\" name=\"pass\"><br></td></tr>";		
									echo "<input type=\"hidden\" name=\"regis\" value=\"y\">\n";
					echo "</table>";	
					echo "<input type=\"submit\" name=\"submit\" value=\"Submit\"><br>\n";
				echo "</form>";
				echo "<a href=\"$thislink\">Back</a></center>";
				echo "</div></center>";
						exit();
		}	
				
		else if(isset($_REQUEST['login_form'])or!isset($_SESSION['regis'])or isset($_REQUEST['logout'])){
					if(isset($_SESSION['regis'])) unset($_SESSION['regis']);
					if(isset($_REQUEST['name'])) unset($_REQUEST['name']);
					if(isset($_REQUEST['fullname'])) unset($_REQUEST['fullname']);
					if(isset($_REQUEST['pass'])) unset($_REQUEST['pass']);
	// gen login form
				echo "<center><div id='loginDisplay' style=\"height:160px;\">";
				echo "<form autocomplete=\"off\" action=\"$thislink\" method=\"post\">\n";
					echo "<table style='width:20%'>";
						echo "<tr><td>ID: </td>";
							echo "<td><input type=\"text\" name=\"name\"><br></td></tr>";
						echo "<tr><td>Pass: </td>";
							echo "<td><input type=\"password\" name=\"pass\"><br></td></tr>";	
							echo "<input type=\"hidden\" name=\"login\" value=\"y\">\n";
					echo "</table>";		
				echo "<input type=\"submit\" name=\"submit\" value=\"Login\"><br>\n";
				echo "</form>";
				echo "<a href=\"$thislink?newregit=y\">New registeration?</a>";
				echo "</div></center>";
				exit();
		}
		echo "</tr></th></center>";
		echo "</div>";

		echo "</center>";
		echo "</font>";
			
//***************************************************
		include('only/bananddel.php');
		include('only/change.php');
// listing all users
		include('only/list.php');
		include('index_user.php');
		`sudo chmod 755 index.php`;
		exit();

?>


