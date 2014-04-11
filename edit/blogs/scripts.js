// JavaScript Document
var source = document.getElementsByTagName("title").item(0).innerHTML;

window.onload = function(){
	// JavaScript Document
	if (('WebkitBackgroundAttachment' in document.body.style 
	 || 'MozBackgroundAttachment' in document.body.style 
	 || 'OBackgroundAttachment' in document.body.style 
	 || 'backgroundAttachment' in document.body.style) && window.innerWidth > 800)
	{
	var height = window.innerHeight
	//document.getElementById("main").style.marginTop = (height * 0.9) - document.getElementById("header").clientHeight + "px"
		if((window.pageYOffset >= window.innerHeight * 0.1 || document.documentElement.scrollTop >= window.innerHeight * 0.3 )){
			document.getElementById("wrap").className = "blur"
		}
		else {
			document.getElementById("wrap").className = "focus"
		}
	
	}
	else {
		document.getElementById("wrap").style.background = "url(blogs/"+source+"/background.jpg) no-repeat center "+document.getElementById("header").clientHeight + "px";
		document.getElementById("wrap").style.backgroundSize = "100%";
		//document.getElementById("main").style.marginTop = window.innerWidth * 0.5625 + "px";
	}
}
window.onscroll = function(){
	if ('WebkitBackgroundAttachment' in document.body.style 
	 || 'MozBackgroundAttachment' in document.body.style 
	 || 'OBackgroundAttachment' in document.body.style 
	 || 'backgroundAttachment' in document.body.style)
	{
		if((window.pageYOffset >= window.innerHeight * 0.1 || document.documentElement.scrollTop >= window.innerHeight * 0.3 )){
			document.getElementById("wrap").className = "blur"
		}
		else {
			document.getElementById("wrap").className = "focus"
		}
	}
}
window.onresize = function() {
	console.log(window.innerWidth)
	if (('WebkitBackgroundAttachment' in document.body.style 
	 || 'MozBackgroundAttachment' in document.body.style 
	 || 'OBackgroundAttachment' in document.body.style 
	 || 'backgroundAttachment' in document.body.style) && window.innerWidth>800)
	{
		document.getElementById("wrap").removeAttribute("style")
		var height = window.innerHeight
	document.getElementById("main").style.marginTop = (height * 0.9) - document.getElementById("header").clientHeight + "px"
	}
	else {
		document.getElementById("wrap").style.background = "url(blogs/"+source+"/background.jpg) no-repeat center "+document.getElementById("header").clientHeight + "px";
		document.getElementById("wrap").style.backgroundSize = "100%";
		//document.getElementById("main").style.marginTop = window.innerWidth * 0.56 + "px";
	}
}