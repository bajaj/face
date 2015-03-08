<?php

$include 'database.php';



$sql = "update directory set count=0";
			$result = $conn->query($sql);
			
			if ($result === TRUE) {
			echo "update";
			}
			else
			{
			echo "nothing";
			}








?>