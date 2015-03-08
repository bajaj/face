<?php


include 'database.php';


$sql = "SELECT dir FROM directory";
$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc());
		{	
			echo $row["dir"];
			
			$files = glob('C:/wamp/www/cvgform/face/images/'.$row["dir"].'/'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file))
				unlink($file); // delete file
				
			}
		
		}
	}
	


?>