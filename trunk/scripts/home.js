
var state = 1,
	slideButtonClicked = false;
	transitioning = false;



$(function(){
	//Automatic Image Slider
	var imgArr = $('slider-img');
	setInterval(function(){
		if(slideButtonClicked || transitioning){ return; }
		var imgSlider = $("#image-slider");
		var curActiveImg = $('.slider-img.center'),
			curActiveNum = $('.slider-img.center').attr("data-num");
		curActiveNum = parseFloat(curActiveNum)
		console.log(curActiveNum)
		$(curActiveImg).removeClass("center");
		if($("#" + parseFloat((curActiveNum+1))).length == 0){
			state = -1;
		} else if ($("#" + parseFloat((curActiveNum-1))).length == 0){
			state = 1;
		}
		var newImg = $("#" + parseFloat((curActiveNum+state))).addClass("center");
		
		transitioning = true;
		setTimeout(function(){
			transitioning = false;
		},1000)
		var imgSliderX = parseInt($(imgSlider).css("left"));
		console.log(imgSliderX + 567)
		$(imgSlider).css("left", imgSliderX - (343 * state));
	},5000);
	
	
	
	var leftBtn = $("#leftBtn"),
		rightBtn = $("#rightBtn");
		
	$(rightBtn).bind('mousedown', function(){
		slideButtonClicked = true;
		
		if(transitioning){return;}
		var imgSlider = $("#image-slider");
		var curActiveImg = $('.slider-img.center'),
			curActiveNum = $('.slider-img.center').attr("data-num");
		curActiveNum = parseFloat(curActiveNum)
		
				if($("#" + parseFloat((curActiveNum+1))).length == 0){ return; }

		$(curActiveImg).removeClass("center");
		
		var newImg = $("#" + parseFloat((curActiveNum+1))).addClass("center");
		
		
		var imgSliderX = parseInt($(imgSlider).css("left"));
		console.log(imgSliderX + 567)
		$(imgSlider).css("left", imgSliderX - 343);
		transitioning = true;
		setTimeout(function(){
			transitioning = false;
		},1000)
		
		setTimeout(function(){
			slideButtonClicked = false;
		},6000)
	})
	
	$(leftBtn).bind('mousedown', function(){
		slideButtonClicked = true;
		
		if(transitioning){return;}
		var imgSlider = $("#image-slider");
		var curActiveImg = $('.slider-img.center'),
			curActiveNum = $('.slider-img.center').attr("data-num");
		curActiveNum = parseFloat(curActiveNum)
		
				if($("#" + parseFloat((curActiveNum-1))).length == 0){ return; }

		$(curActiveImg).removeClass("center");
		
		var newImg = $("#" + parseFloat((curActiveNum-1))).addClass("center");
		
		
		var imgSliderX = parseInt($(imgSlider).css("left"));
		$(imgSlider).css("left", imgSliderX + 343);
		transitioning = true;
		setTimeout(function(){
			transitioning = false;
		},1000)
		
		setTimeout(function(){
			slideButtonClicked = false;
		},6000)
	})
})
