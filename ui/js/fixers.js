$(function() {
	var pageheight = $('#page').height();
	$('#side').css("height", pageheight);


	var backgrounds = [
		'http://timenewsfeed.files.wordpress.com/2013/03/163124767.jpg',
		'http://photojournal.jpl.nasa.gov/jpeg/PIA12348.jpg',
		'http://www.wallsforpc.com/wp-content/uploads/2012/10/Loving-Lions.jpg',
		'http://www.statueclothing.com/wp-content/uploads/2011/02/jungle-walk.jpg',
		'https://www2.ucar.edu/sites/default/files/news/2012/Six_Emperor_Penguins.jpg',
		'http://ayay.co.uk/backgrounds/animals/giraffes/Giraffe-Masai-Mara-Game-Reserve-Kenya.jpg',
		'http://cornfedcritic.files.wordpress.com/2010/12/kanye-west-1.jpg'
	]
	var background = backgrounds[Math.floor(Math.random()*backgrounds.length)];
	$('body').css("background-image", 'url(\'' + background + '\')');


	var num = Math.random() * 100;
	if (num > 95) {
		$("body").css("-webkit-transform", "rotate(90deg)");
	}

});