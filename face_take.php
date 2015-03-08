<?php
include 'database.php';


$sql=" INSERT INTO directory (dir,count) VALUES('x',0)";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$id=$conn->insert_id;



?>


<html>
<head>

    <title>Face</title>

<script src="webcam.js"></script>
<script src="jquery.js"></script>
</head>

<body style="margin-left:400px">

<h1>Team-Singularity Welcomes You!!! </h1>
<h2>&nbsp;&nbsp;&nbsp;You Might get Featured in our dataset</h2>
<input style="margin-left:150px" type="button" value="Take Snapshot" onclick="take_snapshot();"/>

<br/>
<br/>

<b>What Should we call you</b>&nbsp;<input type="text" name="name" id="name" placeholder="CEC ID" />


<div id="my_camera" style="width:520px; height:440px"></div>
    <div id="my_result"></div>

    <script language="JavaScript">

		var id=<?php echo $id ?>;
		var name="";
	
        function sleep(miliseconds) {
            var currentTime = new Date().getTime();

            while (currentTime + miliseconds >= new Date().getTime()) {
            }
        }

        Webcam.set(
            {
                width: 500,
                height: 500,
                dest_width: 500,
                dest_height:500,
                image_format: 'jpeg'

            });

        Webcam.attach('#my_camera');

        var arr = [];

        function take_photo()
        {
            var data_uri = "";
            Webcam.snap(function (data_uri) {
                  data_uri2 = data_uri;
                
            //    arr.push(data_uri);
            });
	
			var url='face_process_dynamic.php?id='+id+'&name='+name;
            Webcam.upload(data_uri2,url);
        }

        function take_snapshot() {

				if($("#name").val()=="")
				{
						alert("please enter your name");
						return;
				
				}
				else
				{
					name=$("#name").val();
				
				}
		
          //  for (var i = 0; i < 10; i++) {

                take_photo();

            //    sleep(1000);

 
            //}

			
	//	window.location.assign("http://10.65.18.114/cvgform/face/thank.php");	
        }




    </script>

   

    

</body>


</html>