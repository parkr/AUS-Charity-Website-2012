<?php
require_once(dirname(__FILE__)."/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AUS Charity</title>
	<link href="humans.txt" rel="contributors" type="text/plain" />
	<link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
	<!--[if IE]>
		<link href="stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->
	<script src="javascript/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/scrolly.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-29516544-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>
</head>
<body>
	<div id="container">
		<div id="banner">
			<div id="logo"></div>
			<div id="branding"><a href="#top">Charity Week</a></div>
			<nav>
				<a href="#home" id="home_nav">Home</a>
				<a href="#about" id="about_nav">About</a>
				<a href="#events" id="events_nav">Events</a>
				<a href="#sponsors" id="sponsors_nav">Sponsors</a>
				<a href="#contact" id="contact_nav">Contact</a>
			</nav>
		</div>
		<div id="buffer"></div>
		<div id="drawing"></div>
		<div id="content">
			<h1 id="home">Home</h1>
			<h1 id="about">About</h1>
			<h1 id="events">Events</h1>
			<?php
				
				$events = Event::getAll();
				foreach($events as $event): 
			?>
			
				<div class="event">
					<img src="<?php echo HTML::link($event->poster); ?>" id="poster">
					<h3 id="<?php echo $event->name; ?>"><?php echo $event->name; ?></h3>
					<h4><?php echo date("l, F d, Y", strtotime($event->datetime)); ?></h4>
				</div>
					
			<?php endforeach; ?>
			<h1 id="sponsors">Sponsors</h1>
			<h1 id="contact">Contact</h1>
		</div>
	</div>
	<div id="bottom">
		
	</div>
</body>
</html>
