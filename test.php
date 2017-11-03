<?php
function sensor($word) {
$word_cut = array("fuck","ไอ้","อี","มึง","กู","เหี้ย","ควย","แม่ง","สัส","สัตว์","สัด","แม่มึง","ไอควาย","หี","ดอกทอง","แม่ง");
return str_replace($word_cut,"***",$word);
}
		
				
			$string='เฮ้ย..ไอ้ขุนไกร เหตุอันใดมึงไม่ต้อนควายเข้าค่าย !!';
			$str = sensor($str);
			echo $string;	
?>
