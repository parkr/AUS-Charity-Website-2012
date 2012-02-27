<?php
	
class HTML {

	public static function link($relative){
		// Make sure that $relative is preceded by a '/'
		if(substr($relative, 0, 1) != "/"){
			$relative = "/$relative";
		}
		
		switch($_SERVER['HTTP_HOST']){
			case 'localhost':
				return "http://localhost/AUSCharity".$relative;
			default: 
				return "http://".$_SERVER['HTTP_HOST'].$relative;
		}
	}
}
	
?>