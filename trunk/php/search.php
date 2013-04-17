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