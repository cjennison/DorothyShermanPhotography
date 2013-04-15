<!DOCTYPE html>

<html>
	<head>
		<title>Dorothy Sherman Photography</title>
		<link rel="stylesheet" href="style/main.css">
		<link rel="stylesheet" href="style/splash.css">
		<link rel="stylesheet" href="style/fonts.css">
		
		<script src="lib/jquery.js"> </script>
		
		
		<?php
			$username = "dsherman";
			$password = "Chern0by!";
			$hostname = "68.178.139.13"; 
			
			//connection to the database
			$dbhandle = mysql_connect($hostname, $username, $password) 
			  or die("Unable to connect to MySQL");
			echo "Connected to MySQL<br>";
			
			//select a database to work with
			$selected = mysql_select_db("dsherman",$dbhandle) 
			  or die("Could not select examples");
			echo "Connected to dSherman<br>";
			
			//execute the SQL query and return records
			$result = mysql_query("SELECT id, name, url FROM pictures");
			$result_array = array();
			if (!$result) { // add this check.
			    die('Invalid query: ' . mysql_error());
			}
			
			
			
			//fetch data
			$images = array();
			while ($row = mysql_fetch_array($result)) {
			   echo "ID:".$row{'id'}." Name:".$row{'name'}." URL: ". //display the results
			   $row{'url'}."<br>";
			   $images[] = array(
			         'id' => $row{'id'},
			         'name' => $row{'name'},
			         'url' => $row{'url'}
			    );
				
				
			}
			
			echo json_encode($images);
			
			mysql_close($dbhandle);
			
			
			
		?>
		
		<script>
			$(function(){
				var img = $("#frontImg");
				setInterval(function(){
					var rand = Math.floor(Math.random()*5);
					$(img).css("background", "url(photos/" + rand + ".jpg) no-repeat")
					$(img).css("background-size", "contain")
				},5000);			
				preloader();	
			})
			
			function preloader(){
				var imgarr = new Array();
				var img = new Image();
				
				imgarr[0] = "photos/1.jpg";
				imgarr[1] = "photos/2.jpg";
				imgarr[2] = "photos/3.jpg";
				imgarr[3] = "photos/4.jpg";
				imgarr[4] = "photos/5.jpg";
				imgarr[5] = "photos/6.jpg";
				imgarr[6] = "photos/7.jpg";
				imgarr[7] = "photos/8.jpg";
				imgarr[8] = "photos/9.jpg";
				
				for(var i = 0;i < imgarr.length; i++){
					
					img.src = imgarr[i];
				}
				
			}
			
			function printNum(num){
				console.log(num + ":       NUMBER")
			}
			
			 //var simple = '<?php echo $simple; ?>';
   			 var complex = <?php echo json_encode($images); ?>;
   			 console.log(complex);
			
		</script>
	</head>
	
	<body>
		
		
		<a href="home.html"><div id="frontImg"> </div></a>
		<div id="title"> </div>
		
		<a href="home.html"> <div id="splashButton"> </div></a>
		
		<ul id="linklist">
			<li>facebook</li>
			<li>etsy</li>
			<li>zazzle</li>
			<li>email</li>
		</ul>
		 
		
		<footer>Copyright 2013 &copy; Dorothy Sherman Photography. All Rights Reserved.</footer>
	</body>
</html>