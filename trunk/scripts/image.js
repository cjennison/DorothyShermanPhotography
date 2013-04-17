var imageid;
var dest;



function init(){
	
	console.log(complex);
	
	
	
	var hash = getUrlVars();
	
	console.log(hash["photoid"]);
	imageid = hash["photoid"];
	dest = hash["dest"];
	console.log(dest);
	
	
	if(dest == "home"){
		$("#back").attr("href", "home.html");
	} else {
		$("#back").attr("href", "search.php?searchQuery=" + dest);
	}
	
	
	$("#frontImg #frimg").attr("src", "photos/" + imageid + ".jpg");
	$("img#enimg").attr("src", "photos/" + imageid + ".jpg");
	$("#enlarger").css('pointer-events', "none");
	$("#frontImg").bind('click', function(e){
		startEnlarger();
	});
	
	
	
	for(var i=0;i<complex.length;i++){
		if(imageid == complex[i].id){
			$("#name").html(complex[i].name);
			$("#description").html(complex[i].description);
		}
	}
	
}

function startEnlarger(){
	$("#enlarger").css('opacity', 1);
	$("#enlarger").css('pointer-events', "");
	
	$("#shadowbox").bind('click', function(e){
		console.log("CLICKED SHADOW");
		$("#enlarger").css('opacity', 0)
		$("#enlarger").css('pointer-events', "none")
	});
	
	$("#closebtn").bind('click', function(e){
		$("#enlarger").css('opacity', 0)
		$("#enlarger").css('pointer-events', "none")
	});
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