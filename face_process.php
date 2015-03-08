<?php

include 'database.php';


$target_dir = "images/";
  
  
$sql = "SELECT dir,count FROM directory where count<10 LIMIT 1";
$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		
			//$image=imagecreatefromjpeg($_FILES['webcam']['tmp_name']);
			
			//imagejpeg($image, "images/file_"+$row['count']+1+".jpg");
			$dir=$row['dir'];
			
			$sql = "update directory set count=count+1 where dir='".$dir."'";
			$result = $conn->query($sql);
			
			if ($result === TRUE) {
			echo "update";
			}
			else
			{
			echo "nothing";
			}
			
		//	$name=$target_dir.$row['dir']."/".$row['dir'].$row['count'].basename($_FILES['webcam']['name']);
			
		//	$name=$target_dir.$row['dir']."/".basename($_FILES['webcam']['name']);
			
			$c=$row['count']+1;
			
			$name=$target_dir.$row['dir']."/".$row['dir']."_".$c.".png";
			move_uploaded_file($_FILES['webcam']['tmp_name'], $name);
		
		echo "done";		
		
		
		
	}


?>