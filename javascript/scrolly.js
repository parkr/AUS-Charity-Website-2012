sections = {
	"top": 0,
	"about": 429,
	"events": 681,
	"sponsors": 1214,
	"contact": 1430
}

Object.prototype.keys = function (){
	var keys = [];
	for(var i in this) 
		if (this.hasOwnProperty(i))
			keys.push(i);
	return keys;
}

window.onscroll = function(e) {
	var offset = 0;//window.innerHeight / 1.6;
	var keys = sections.keys();
	for(var i=keys.length; i >= 0; i--){
		if(window.pageYOffset + offset > sections[keys[i]]){
			var active_els = document.getElementsByClassName("active");
			for(var k=0; k<active_els.length; k++){
				active_els[k].className = null;
			}
			document.getElementById(keys[i]+"_nav").className = "active";
			console && console.log && console.log("YEP for", keys[i], window.pageYOffset, sections[keys[i]]);
			return;
		}
	}
}

window.onhashchange = function(){
	_gaq.push(['_trackPageview', window.location.pathname + window.location.hash ]);
}

document.onreadystatechange = function(){
	return;
	if(this.readyState === "complete"){
		var keys = sections.keys();
		for(var i=0; i < keys.length; i++)
			sections[keys[i]] = document.getElementById(keys[i]).offsetTop;
		sections["top"] = 200;
		document.getElementById("top_nav").className = "active";
	}
}