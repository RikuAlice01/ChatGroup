<?php
			include 'styles.css';

			if(!isset($_SESSION['regis'])){
					exit();
			}

			$fullname=$_SESSION['fullname'];
			$loginname=$_SESSION['regis'];
			
		`sudo chmod 777 online`;
			touch("online/$loginname"); // for online keeping
		`sudo chmod 755 online`;
			
		`sudo chmod 777 comment.txt`;
			$file = file_get_contents('comment.txt', FILE_USE_INCLUDE_PATH);
			$day = date("d/m/Y H:i:s");
			$str='';
			
			if(!file_exists('comment.txt')){
					file_put_contents('comment.txt','',FILE_APPEND);
			}
			
			isset($_REQUEST['comments']) ? $str=$_REQUEST['comments']: $str= '';
			$fullname=$_SESSION['regis'];

			echo "<center><div id='Display'>";
			echo"<center><table><tr>";
			echo "<td>";
		
			echo "<span style=\"FONT-FAMILY: TH SarabunPSK;FONT-SIZE: 25px;color:#FFFFFF;font-weight: bold;\">Welcome $fullname</span><br>\n";

//Clear Chat
			isset($_REQUEST['Clear']) ? $Clear=$_REQUEST['Clear'] : $Clear= '';
			
			if(isset($_REQUEST['Clear']) and $_SESSION['regis']=='ADMIN' ){
				`sudo chmod 777 comment.txt`;
				`sudo echo '' > comment.txt`;
					$str="Clear<br>\n";
					file_put_contents("comment.txt","<font size=\"1\" color='green'>".$day."  ".$fullname.': '.$str."</font>", FILE_APPEND | LOCK_EX);
				if(isset($_REQUEST['Clear'])) unset($_REQUEST['Clear']);
				`sudo chmod 755 comment.txt`;
			}

//Save Chat
			else if(isset($_REQUEST['Save']) and $_SESSION['regis']=='ADMIN' ){
				`sudo chmod 777 save.txt`;
				
				 $a=file_get_contents('comment.txt', FILE_USE_INCLUDE_PATH);
				 	file_put_contents("save.txt","$a", FILE_APPEND | LOCK_EX);
				
				if(isset($_REQUEST['Save'])) unset($_REQUEST['Save']);
				`sudo chmod 755 save.txt`;
			}
//Check bad word
			else if($str != null){
				function sensor($word) {
					include('toxic.php');
				return str_replace($word_cut,"***",$word);
				}
				
				$str = sensor($str);
				if($_SESSION['regis']=='ADMIN')	$colortext='red';
				else $colortext='#808080';
					file_put_contents("comment.txt", "<font size=\"1\" color=$colortext>".$day."  ".$fullname.': '.$str."<br>\n</font>", FILE_APPEND | LOCK_EX);
				if(isset($_REQUEST['comments'])) unset($_REQUEST['comments']);
				if(isset($str)) unset($str);
			}
			
// display Chat screen
			echo "<div id='showit1' style=\"height:270px; width:796px; padding: 1px 5px; background: #FFFFFF;  overflow: auto; border: 0px solid #333; box-shadow: 0px 0px 0px #404040;border-radius:5px;cursor:pointer\">";
			echo "</div>";
						echo   "<script language=\"JavaScript\" type=\"text/javascript\">\n";
						echo  "function getdata1(){\n";
						echo  "   var xmlHttp;\n";
						echo  "   try{\n";
						echo  "    // Firefox, Opera 8.0+, Safari\n";
						echo  "    xmlHttp=new XMLHttpRequest();\n";
						echo  "   }\n";
						echo  "   catch (e){\n";
						echo  "        try {\n";  // IE6
						echo  "             xmlHttp=new ActiveXObject(\"Msxml2.XMLHTTP\");\n";
						echo  "        }\n";
						echo  "        catch (e){\n";
						echo  "                 try {\n";   // IE5
						echo  "                      xmlHttp=new ActiveXObject(\"Microsoft.XMLHTTP\");\n";
						echo  "                 }\n";
						echo  "                 catch (e) {\n";
						echo  "                           alert(\"Your browser does not support AJAX!\");\n";
						echo  "                           return false;\n";
						echo  "                 }\n";
						echo  "        }\n";
						echo  "   }\n";

						echo  "   xmlHttp.onreadystatechange=function() {\n";
						echo  "        if(xmlHttp.readyState==4) {\n";
						echo  "                 var b = xmlHttp.responseText;\n";
						echo  "                  document.getElementById('showit1').innerHTML= b;\n";
						echo "					var element1 = document.getElementById(\"showit1\");\n";
						echo "					element.scrollTop = element1.scrollHeight;\n";
						echo  "        }\n";
						echo  "   }\n";
						echo  "    xmlHttp.open(\"GET\",'control/comment_ajax.php',true);\n";
						echo  "    xmlHttp.send(null);\n";
						echo "     setTimeout('getdata1()',2000);\n"; // 2 sec.
						echo  "}\n";
						echo " getdata1();\n";
						echo "</script>\n";
						
			echo "<form autocomplete=\"off\" action=\"$thislink\" method=\"post\">\n";
			echo "<input type=\"text\" name=\"comments\">\n";
			echo "</td>";
			echo "<td>";

// display oneline screen
			echo "<div id='showit' style=\"height:280px; width:160px; padding: 1px 5px; background: #909090;  overflow: auto; border: 0px solid #333; box-shadow: 1px 1px 2px #404040;border-radius:10px;cursor:pointer\">";

						echo   "<script language=\"JavaScript\" type=\"text/javascript\">\n";
						echo  "function sendme(x){\n";
						echo  "   var bx='b'+x;\n";
						echo  "   document.getElementById(bx).disabled = true;\n";            
						echo  "   var xmlHttp;\n";
						echo  "   try{\n";
						echo  "    // Firefox, Opera 8.0+, Safari\n";
						echo  "    xmlHttp=new XMLHttpRequest();\n";
						echo  "   }\n";
						echo  "   catch (e){\n";
						echo  "        try {\n";  // IE6
						echo  "             xmlHttp=new ActiveXObject(\"Msxml2.XMLHTTP\");\n";
						echo  "        }\n";
						echo  "        catch (e){\n";
						echo  "                 try {\n";   // IE5
						echo  "                      xmlHttp=new ActiveXObject(\"Microsoft.XMLHTTP\");\n";
						echo  "                 }\n";
						echo  "                 catch (e) {\n";
						echo  "                           alert(\"Your browser does not support AJAX!\");\n";
						echo  "                           return false;\n";
						echo  "                 }\n";
						echo  "        }\n";
						echo  "   }\n";

						echo  "   xmlHttp.onreadystatechange=function() {\n";
						echo  "        if(xmlHttp.readyState==4) {\n";
						echo  "            location.href='index.php';\n";
						echo  "        }\n";
						echo  "   }\n";
						echo  "    xmlHttp.open(\"GET\",'take_select.php?select='+x,true);\n";
						echo  "    xmlHttp.send(null);\n";
						echo  "}\n";
						
						echo  "function getdata(){\n";
						echo  "   var xmlHttp;\n";
						echo  "   try{\n";
						echo  "    // Firefox, Opera 8.0+, Safari\n";
						echo  "    xmlHttp=new XMLHttpRequest();\n";
						echo  "   }\n";
						echo  "   catch (e){\n";
						echo  "        try {\n";  // IE6
						echo  "             xmlHttp=new ActiveXObject(\"Msxml2.XMLHTTP\");\n";
						echo  "        }\n";
						echo  "        catch (e){\n";
						echo  "                 try {\n";   // IE5
						echo  "                      xmlHttp=new ActiveXObject(\"Microsoft.XMLHTTP\");\n";
						echo  "                 }\n";
						echo  "                 catch (e) {\n";
						echo  "                           alert(\"Your browser does not support AJAX!\");\n";
						echo  "                           return false;\n";
						echo  "                 }\n";
						echo  "        }\n";
						echo  "   }\n";

						echo  "   xmlHttp.onreadystatechange=function() {\n";
						echo  "        if(xmlHttp.readyState==4) {\n";
						echo  "                 var a = xmlHttp.responseText;\n";
						echo  "                  document.getElementById('showit').innerHTML= a;\n";
						echo "					var element = document.getElementById(\"showit\");\n";
						echo "					element.scrollTop = element.scrollHeight;\n";
						echo  "        }\n";
						echo  "   }\n";
						echo  "    xmlHttp.open(\"GET\",'user_getdata_ajax.php',true);\n";
						echo  "    xmlHttp.send(null);\n";
						echo "     setTimeout('getdata()',1000);\n"; // 1 sec.
						echo  "}\n";
						echo " getdata();\n";
						echo "</script>\n";
						
			echo "</div>";
			

			if($_SESSION['regis']=='ADMIN'){
					echo "<input type=\"submit\" value=\"Submit\">\n";
					echo "<input type=\"submit\" value=\"Clear\"  name=\"Clear\">\n";
					echo "<input type=\"submit\" value=\"Save\"  name=\"Save\">\n";
					echo "</td>";
					echo "</tr>";
					echo "</form>\n";
					echo "</table></center>\n";
					

		// find number of users
				`sudo chmod 777 online`;
					$nuser=`cd online;ls -1 | wc -l`;	
					echo "There are <a href=\"$thislink?list=y\">$nuser</a> registered users.\n";
				`sudo chmod 755 online`;

		// logout button
					echo "<form action=\"$thislink\" method=\"post\">\n";	
					echo "<input type=\"submit\" name=\"logout\" value=\"Logout\"><br>\n";

			}else{
				
					echo "<input type=\"submit\" value=\"Submit\">\n";
					echo "</td>";
					echo "</tr>";
					echo "</form>\n";
					echo "</table></center>\n";				
				
					$edit="<form action=\"$thislink\" method=\"post\"><input type=\"hidden\" name=\"name\" value=\"$loginname\"><input type=\"submit\" name=\"edit\" value=\"Edit\"><br></form>";
					$change_pass="<form action=\"$thislink\" method=\"post\"><input type=\"hidden\" name=\"name\" value=\"$loginname\"><input type=\"submit\" name=\"change_pas\" value=\"Change Password\"><br></form>";
					$logout="<form action=\"$thislink\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Logout\"><br></form>";
					echo "<table><tr><td>$edit</td><td>$change_pass</td><td>$logout</td></tr><table>";
			}
			echo "</form>";
			echo "</div></center>";
			
			`sudo chmod 755 comment.txt`;
			exit();
			
?>
