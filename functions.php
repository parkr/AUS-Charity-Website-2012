<?php

date_default_timezone_set("America/New_York");

$dir = dirname(__FILE__);
require_once($dir."/classes/HTML.class.php");
require_once($dir."/classes/DB.class.php");
require_once($dir."/classes/Event.class.php");
require_once($dir."/classes/Page.class.php");
require_once($dir."/classes/Sponsor.class.php");

function linkify($text){
	$ret = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $text);
	$ret = preg_replace('/([a-z0-9][-a-z0-9._]*[a-z0-9]*\@[a-z0-9][-a-z0-9_]+[a-z0-9]*\.[a-z0-9][-a-z0-9_-][a-z0-9]+)/i', '<a href="mailto:\\1">\\1</a>', $ret);
	return $ret;
}

function tag($tag, $content){
	if($content == null){
		return "<$tag />";
	}
	return "<$tag>$content</$tag>";
}
	
?>