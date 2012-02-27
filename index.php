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
		<div id="top"></div>
		<div id="banner">
			<div id="logo"></div>
			<div id="branding"><a href="#top" id="home_nav">Charity Week</a></div>
			<nav>
				<a href="#welcome" id="welcome_nav">Welcome</a>
				<a href="#about" id="about_nav">About</a>
				<a href="#events" id="events_nav">Events</a>
				<a href="#sponsors" id="sponsors_nav">Sponsors</a>
				<a href="#contact" id="contact_nav">Contact</a>
			</nav>
		</div>
		<div id="buffer"></div>
		<div id="home"></div>
		<div id="drawing"></div>
		<div id="content">
			<h1 id="welcome" class="main_item">Welcome</h1>
			<div id="welcomePage">
				<?php
					
					$welcomePage = new Page("Welcome");
					echo nl2br(linkify($welcomePage->content));
					
				?>
			</div>
			
			<h1 id="about" class="main_item">About</h1>
			<div id="aboutPage">
				<?php
					
					$aboutPage = new Page("About");
					echo nl2br(($aboutPage->content));
					
				?>
			</div>
			
			<h1 id="events" class="main_item">Events</h1>
			<div id="eventsList">
				<?php
				
					$events = Event::getAll();
					foreach($events as $event): 
				?>
			
					<div class="event">
						<div class="poster" id="<?php echo str_replace('.jpg', '', basename($event->poster)); ?>">
							<img src="<?php echo HTML::link($event->poster); ?>">
						</div>
						<div class="info">
							<div id="<?php echo $event->name; ?>" class="name"><?php echo $event->name; ?></div>
							<div class="datetime">
								<?php echo date("l, F d, Y", strtotime($event->datetime)); ?>
							</div>
							<div id="location">
								<?php
									if($event->location != ""){
										echo htmlentities($event->location);
									}	
								?>
							</div>
							<div class="cost">
								<?php
									if($event->cost != ""){
										echo $event->cost;
									}
								?>
							</div>
							<div class="description">
								<?php echo nl2br(($event->description)); ?>
							</div>
							<div class="sponsored_by">
								<?php 
									$sponsors = Sponsor::getSponsorsOfEvent($event->id);
									if($sponsors){
										echo "Sponsored by ";
										foreach($sponsors as $sponsor){
											if($sponsor->name != ""){
												$list .= ($sponsor->name.", "); 
											}
										}
										echo substr($list, 0, strlen($list)-2);
									}
								?>
							</div>
							
						</div>
					</div>
					
				<?php endforeach; ?>
			</div>
			
			<h1 id="sponsors" class="main_item">Sponsors</h1>
			<ul id="sponsorsList">
				<?php
					$sponsors = Sponsor::getAll();
					foreach($sponsors as $sponsor): 
				?>
				<li class="sponsor">
					<a href="<?php echo $sponsor->website; ?>" title="<?php echo $sponsor->name; ?>" target="_blank"><?php echo htmlentities($sponsor->name); ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			
			
			<h1 id="contact" class="main_item">Contact</h1>
			<div id="contactPage">
				<div id="general_inquiries">
					<?php
						$page = new Page("General Inquiries");
						echo nl2br(linkify(htmlentities($page->content)));
					?>
				</div>
				<div id="charity_week_coordinators">
					<?php
						$page = new Page("Charity Week Coordinators");
						$page->content = str_replace("\r\n", "\n", $page->content);
						$people = explode("\n\n", $page->content);
						
						foreach($people as $personn):
							$p = explode("\n", $personn);
							echo linkify(tag("p", tag("strong", $p[0])."<br>".tag("em", $p[1])));
						endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="bottom">
		
	</div>
</body>
</html>
