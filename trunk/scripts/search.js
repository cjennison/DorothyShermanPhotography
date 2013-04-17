var queryData = [];
var imageQueryData = [];
var i = 0;

var queryName;


//Populate results from search
function init(){
	
	console.log(complex);
	var getQuery = setInterval(function(){
		if(complex != null){
			startSearchQuery();
			clearInterval(getQuery);
		}
	},500)
	
	
	//startSearchQuery();

}

function startSearchQuery(){
	for(var i=0;i<complex.length;i++){
		console.log(complex[i].primary);
		complex[i].searchTermArray = complex[i].secondary.split(/,/);
		//console.log(complex[i].searchTermArray)
		complex[i].searchTermArray.push(complex[i].primary);
		console.log(complex[i].searchTermArray)
	}
	
	
	var vars = getUrlVars();
	queryName = vars["searchQuery"]
	queryData = new Array();
	console.log("Populating List");
	
	imageQueryData = new Array();
	
	for(var q = 0;q < complex.length;q++){
		for(var searchIndex = 0; searchIndex < complex[q].searchTermArray.length ;searchIndex++){
			console.log(complex[q].searchTermArray[searchIndex]);
			if(complex[q].searchTermArray[searchIndex] == queryName){
				imageQueryData.push(complex[q]);
			}
		}
	}
	
	console.log(imageQueryData);
	
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
	if(i > imageQueryData.length - 1){ return; };
	
	var list = $("#results-list");
	var listItem = $("<a href='image.php?photoid=" + imageQueryData[i].id + "&dest=" + $("#searchname").html() + "'><li><div class='search-img'>" +
	"<span class='photo-text'><center>" + imageQueryData[i].name + "</center></span>" + "</div></li></a>")
	$(list).append(listItem);
	
	var imgArray = $(".search-img");
	console.log(imgArray[i]);
	$(imgArray[i]).attr("photo-id", imageQueryData[i].id);
	$(imgArray[i]).css("background", "url(photos/" + imageQueryData[i].id + ".jpg)");
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