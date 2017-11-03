<?php
		include('style/Style.css');
//connect to Database
		include('database/db.php');
        $viewquery= "INSERT INTO `costumer` 
        	(`custome_id`, `customer_name`, `customer_address`, `customer_phone`) VALUES 
        	('', 'Somchai Meadee', '543', '099123456'),
        	('', 'Sommea Meadee', '542', '099123457'),
        	('', 'Somsri Meadee', '541', '099123458'),
        	('', 'Somdee Meadee', '540', '099123459')"; 
        $run=mysqli_query($db,$viewquery); 
		$qcrow=mysqli_fetch_array($run,MYSQLI_ASSOC);
        if (!$viewquery) {
			printf("Error: %s\n", mysqli_error($db));
				exit();
		}else{

			echo "<br> insert successfully <br>";
		}

?>