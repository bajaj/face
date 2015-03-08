<?php

include 'database.php';


$target_dir = "images/";
  
  
if(isset($_REQUEST['id']))
{  
	if(is_int($_REQUEST['id']) || 1)
	{
	
	$id=$_GET['id'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$name=$_GET['name'];
	
	//	echo $id;
		
		$sql = "SELECT count FROM directory where ip='{$ip}' LIMIT 1";
		$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
		//		echo "ip";
		//			return;
			}
	
		$sql="update directory SET name='{$name}',ip='{$ip}',dir='s".$id."' where id={$id}";

		if ($conn->query($sql) === TRUE) {
		   // echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
				$dir="s".$id;
				
				//$dir=$name;
	
	
				if (!file_exists($target_dir.$name)) {
			mkdir($target_dir.$name, 0777, true);
		}
  
		$sql = "SELECT dir,count,name FROM directory where id={$id} LIMIT 1";
		$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				
					//$image=imagecreatefromjpeg($_FILES['webcam']['tmp_name']);
					
					//imagejpeg($image, "images/file_"+$row['count']+1+".jpg");
					$dir=$row['dir'];
					
					$dir_name=$row['name'];
					
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
					
				//	$name=$target_dir.$row['dir']."/".$row['dir']."_".$c.".png";
					
					$name_dir=$target_dir.$row['name']."/".$row['name']."_".$c.".png";
					move_uploaded_file($_FILES['webcam']['tmp_name'], $name_dir);
				
				echo "done";		
				
				
				
			}
	}
			
}

?>