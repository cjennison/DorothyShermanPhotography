<!DOCTYPE html>

<html>
	<head>
		<title>Dorothy Sherman Photography</title>
		<link rel="stylesheet" href="style/main.css">
		<link rel="stylesheet" href="style/splash.css">
		<link rel="stylesheet" href="style/fonts.css">
		
		<script src="lib/jquery.js"> </script>
		
		
		
		
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