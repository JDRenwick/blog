// JavaScript Document
var source = document.getElementsByTagName("title").item(0).innerHTML;

window.onload = function(){
	// JavaScript Document
	if (window.innerWidth>800)
	{
		var height = window.innerHeight
		if (window.innerHeight/(document.body.clientWidth*0.5625)*100 < 100){
			document.getElementById("wrap").style.backgroundSize = 100+"%";
		}
		else {
			document.getElementById("wrap").style.backgroundSize = window.innerHeight/(document.body.clientWidth*0.5625)*100+"%";
		}
		document.getElementById("main").style.marginTop = (height * 0.9) - document.getElementById("header").clientHeight + "px"
		if((window.pageYOffset >= window.innerHeight * 0.1 || document.documentElement.scrollTop >= window.innerHeight * 0.3 )){
			document.getElementById("wrap").className = "blur"
		}
		else {
			document.getElementById("wrap").className = "focus"
		}
	
	}
	else {
		document.getElementById("wrap").className = "small"
		document.getElementById("wrap").style.backgroundPosition = "center "+document.getElementById("header").clientHeight + "px";
		document.getElementById("main").style.marginTop = (document.getElementById("wrap").clientWidth/1920) * 1080 + "px";
	}
	preloader()
	
}
window.onscroll = function(){
	if (window.innerWidth>800)
	{
		if((window.pageYOffset >= window.innerHeight * 0.1 || document.documentElement.scrollTop >= window.innerHeight * 0.3 ) && blurImage.complete){
			
			document.getElementById("wrap").className = "blur"
		if (window.innerHeight/(document.body.clientWidth*0.5625)*100 < 100){
			document.getElementById("wrap").style.backgroundSize = 100+"%";
		}
		else {
			document.getElementById("wrap").style.backgroundSize = window.innerHeight/(document.body.clientWidth*0.5625)*100+"%";
		}
		}
		else {
			document.getElementById("wrap").className = "focus"
		}
	}
	else {
		document.getElementById("wrap").className = "small"
	}
}
window.onresize = function() {
	document.getElementById("main").removeAttribute("style")
	if (window.innerWidth>800)
	{
		document.getElementById("wrap").removeAttribute("style")
		if (window.innerHeight/(document.body.clientWidth*0.5625)*100 < 100){
			document.getElementById("wrap").style.backgroundSize = 100+"%";
		}
		else {
			document.getElementById("wrap").style.backgroundSize = window.innerHeight/(document.body.clientWidth*0.5625)*100+"%";
		}
		var height = window.innerHeight
		if((window.pageYOffset >= window.innerHeight * 0.1 || document.documentElement.scrollTop >= window.innerHeight * 0.3 )){
			document.getElementById("wrap").className = "blur"
		}
		else {
			document.getElementById("wrap").className = "focus"
		}
	document.getElementById("main").style.marginTop = (height * 0.9) - document.getElementById("header").clientHeight + "px"
	}
	else {
		document.getElementById("wrap").removeAttribute("style");
		document.getElementById("wrap").className = "small"
		document.getElementById("wrap").style.backgroundPosition = "center "+document.getElementById("header").clientHeight + "px";
		document.getElementById("main").style.marginTop = (document.getElementById("wrap").clientWidth/1920) * 1080 + "px";
	}
}

document.getElementById("wrap").onclick = function(e) {
	if (e.target.id != "wrap") {
		return
	}
	else {
		if (document.getElementById("wrap").style.backgroundSize != "100%" && document.getElementById("wrap").className == "focus" && window.innerWidth>800) {
				document.getElementById("wrap").style.backgroundSize = "100%";
		}
		else if (window.innerWidth>800) {
			document.getElementById("wrap").style.backgroundSize = window.innerHeight/(document.body.clientWidth*0.5625)*100+"%";
		}
	}
}