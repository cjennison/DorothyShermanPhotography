<!DOCTYPE html>
<html>
	<head>
		<title>Dorothy Sherman Photography</title>
		<link rel="stylesheet" href="style/main.css">
		<link rel="stylesheet" href="style/search.css">
		<link rel="stylesheet" href="style/fonts.css">
		
		<script src="lib/jquery.js"> </script>
		<script src="scripts/search.js"> </script>
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
			         'secondary' => $row{'secondary'}
			    );
				
				
			}
			
			//echo json_encode($images);
			
			mysql_close($dbhandle);
			
			
			
		?>
		
		<script>
			var complex = <?php echo json_encode($images); ?>;
		</script>
	</head>
	<body onload="init()">
		<a href="home.html">
			<div id="back-button"> 
				
			</div>
			<span class="back-text">Back</span>
		</a>
		<a href="home.html"><div id="title"> </div></a>

		<div id="results-container">
			<ul id="results-list">
				
			</ul>
		</div>
		
		<span id="showing">Showing Results for <span id="searchname"></span></span>
		<div id="search-box">
			<input id="searchbox" type="text" value="Search" onclick="this.value='';" onblur="this.value=!this.value?'Search':this.value;" > </input>
			<img id="magnifying-glass" src="img/Magnifyingglass.png" width="17px">
		</div>
		
		<script>
			$("#searchbox").keyup(function(event){
			    if(event.keyCode == 13){
			    	document.location.href = "http://reaktantstudios.com/outgoing/sherman/search.php?" + "searchQuery=" + $('#searchbox').val();
			        $("#searchbox").click();
			        console.log("Searching..")
			    }
			});
		</script>
		
		<footer>Copyright 2013 &copy; Dorothy Sherman Photography. All Rights Reserved.</footer>
	</body>
</html>