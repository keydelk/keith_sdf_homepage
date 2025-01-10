<!DOCTYPE html>
<html lang="en-US">
        <head>
                <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Keith's Homepage</title>
                <meta name="keywords" content="unix, netbsd, free webhosting, SDF">
                <meta name="description" content="Home of Keith's Blog and other stuff">
		<meta name="author" content="Keith Keydel">
		<link rel="stylesheet" href="/css/simple.css">
		<link rel="stylesheet" href="/css/customizations.css">
		<link rel="stylesheet" href="/fa/css/all.min.css">
		<link rel="icon" href="/favicon/favicon.ico" sizes="32x32">
		<link rel="apple-touch-icon" href="/favicon/apple-touch-icon.png">
		<link rel="manifest" href="/favicon/site.webmanifest">
	</head>
	<body>
		<header>
			<?php include "nav.php" ?>

			<h1>Keith's Homepage</h1>
		</header>

		<main>
			<p>
				Inspired by <a href="https://htmlforpeople.com/">HTML for People</a>. 
				This site is my little home on the internet. It will contain pages for
				whatever purposes that I need at the time. My plan is to code this entirely
				by hand. I also am avoiding any cookies or trackers that are ubiquitous
				in the modern web.
			</p>
			<p>
			  This site is a work in progress. For now:
			</p>
			<ul>
			  <li><a href="/blog/">Check out my Blog</a></li>
			</ul>
			
			<h2>Update to PHP</h2>
			<p>
				At this point, I'm updating the page to use PHP to make the nav 
				section easier to maintain and to automatically update the date.
			</p>

			<h2>Multiple CSS Style-Sheets</h2>
			<p>
				At this point, I'm reverting the 
				<a href="https://simplecss.org/">simple.css stylesheet</a> back 
				to it's original state and instead use a separate 
				customization.css file to override it. Current overrides include 
				the blue color scheme, the cursive font on Tilly's graduation 
				page, and the sticky headers (though, I'm not sure I like the 
				sticky headers).
			</p>
			<p>
				
			</p>
			<p>
			    I'm not sure if this is better, per se, but this gives me the 
			    chance to try both methods controlling the appearance of my site. 
				It also allows me to update the styles for the newer blog entries, 
				while leaving the styling of the older pages static. This preserves 
				the appearance of the older pages, making it more clear how my site 
				is evolving over time.
			</p>
			<p>
				I have also considered using the minified and/or 
				<abbr title="Content Delivery Network">CDN</abbr> version.
				However, I felt that was at odds with my desire to have an entirely 
				self-hosted and human-readable site.
			</p>
			<p>
				This decision does make some things a bit more difficult, such
				as hosting the <i class="fa-solid fa-font-awesome"></i>
				<a href="https://docs.fontawesome.com/web/setup/host-yourself/webfonts">
				Font Awesome icons (Web Fonts)</a> myself. But I think that is worth 
				it to have the site work the way I want it to work.
			</p>

			<p>🐘 <a href="https://fosstodon.org/@keydelk">Follow me on Mastodon</a></p>
			<p class="notice">
				<strong>Want to learn how to make a website like this?</strong>
				<br> Check out the free web book 
				<a href="https://htmlforpeople.com/">HTML for People</a>. 
				It's made for everyone and teaches you how to make a webpage in a 
				friendly, approachable way.
			</p>
		</main>

		<?php include "footer.php"?>
	</body>
</html>
