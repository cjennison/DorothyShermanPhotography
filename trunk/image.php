<!DOCTYPE html>
<html>
	<head>
		<title>Dorothy Sherman Photography</title>
		<link rel="stylesheet" href="style/main.css">
		<link rel="stylesheet" href="style/fonts.css">
		<link rel="stylesheet" href="style/image.css">
		
		<script src="lib/jquery.js"> </script>
		<script src="scripts/image.js"> </script>
		
		<?php
			$username = "dsherman";
			$password = "Chern0by!";
			$hostname = "68.178.139.13"; 
			
			//connection to the database
			$dbhandle = mysql_connect($hostname, $username, $password) 
			  or die("Unable to connect to MySQL");
			//echo "Connected to MySQL<br>";
			
			//select a database to work with
			$selected = mysql_select_db("dsherman",$dbhandle) 
			  or die("Could not select examples");
			//echo "Connected to dSherman<br>";
			
			//execute the SQL query and return records
			$result = mysql_query("SELECT * FROM pictures");
			$result_array = array();
			if (!$result) { // add this check.
			    die('Invalid query: ' . mysql_error());
			}

			//fetch data
			$images = array();
			while ($row = mysql_fetch_array($result)) {
			  // echo "ID:".$row{'id'}." Name:".$row{'name'}." URL: ". //display the results
			   $row{'url'}."<br>";
			   $images[] = array(
			         'id' => $row{'id'},
			         'name' => $row{'name'},
			         'url' => $row{'url'},
			         'primary' => $row{'primary'},
			         'secondary' => $row{'secondary'},
			         'description' => $row{'description'}
			    );
			}

			mysql_close($dbhandle);

		?>
		
		<script>
			var complex = <?php echo json_encode($images); ?>;
		</script>
		
	</head>
	
	<body onload="init()">
		<a id="back" href="search.php?searchQuery=Butterflies">
			<div id="back-button"> 
				
			</div>
			<span class="back-text">Back</span>
		</a>
		<div id="frontImg"> 
			<img id="frimg" src="img/loadingimg.png">
			<div id="description-container">
				<div id="name">Loading...</div>
				<div id="description">Loading...</div>
			</div>
		</div>
		<a href="home.html"><div id="title"> </div></a>
		
		
		
		
		<ul id="linklist">
			<li>facebook</li>
			<li>etsy</li>
			<li>zazzle</li>
			<li>email</li>
		</ul>
		<div id="enlarger">
			<div id="shadowbox"> </div>
			<div id="img"><img id="enimg" src="img/loadingimg.png"></div>
			<div id="closebtn"></div>
		</div>
		<footer>Copyright 2013 &copy; Dorothy Sherman Photography. All Rights Reserved.</footer>
	</body>
</html>