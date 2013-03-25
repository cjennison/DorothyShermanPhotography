var queryData = [];
var i = 0;

var queryName;


//Populate results from search
function init(){
	var vars = getUrlVars();
	queryName = vars["searchQuery"]
	queryData = new Array();
	console.log("Populating List");
	
	//Get Search Object from Server
	//TODO: Get Actual Search
	queryData = [0,4,8,2,3,6,2,3,6,4,1,0];
	
	$("#searchname").html(queryName);
	//Display In UL
	setTimeout(function(){
		displayQuery();
	},100)
}


function displayQuery(){
	if(i > queryData.length - 1){ return; };
	
	var list = $("#results-list");
	var listItem = $("<a href='image.html?photoid=" + queryData[i] + "&dest=" + $("#searchname").html() + "'><li><div class='search-img'>" +
	"<span class='photo-text'><center>Example</center></span>" + "</div></li></a>")
	$(list).append(listItem);
	
	var imgArray = $(".search-img");
	console.log(imgArray[i]);
	$(imgArray[i]).attr("photo-id", queryData[i]);
	$(imgArray[i]).css("background", "url(photos/" + queryData[i] + ".jpg)");
	$(imgArray[i]).css("background-size", "100% 100%");
	
	i++;
	
	setTimeout(function(){
		$(".search-img").css("opacity", 1)
		displayQuery();
	},100)
	
}

function getUrlVars() {

    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++) {

      hash = hashes[i].split('=');

      vars.push(hash[0]);

      vars[hash[0]] = hash[1];

    }

  return vars;

}