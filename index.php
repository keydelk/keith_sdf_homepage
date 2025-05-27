<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keith's Homepage</title>
    <meta name="keywords" content="blog, web dev, unix, netbsd, SDF">
    <meta name="description" content="Home of Keith's Blog and other stuff">
    <meta name="author" content="Keith Keydel">
    <link rel="stylesheet" href="/css/simple.css">
    <link rel="stylesheet" href="/css/customizations.css">
    <link rel="stylesheet" href="/fa/css/all.min.css">
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Keith's SDF">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="author" href="/humans.txt">
  </head>
  <body>
    <header>
      <?php include "nav.php" ?>

      <h1>Keith's Homepage</h1>
    </header>

      <main id="main">
	<p>
	  Inspired by <a href="https://htmlforpeople.com/">HTML for People</a>,
	  this site is my little home on the internet. It will contain pages for
	  whatever purposes that I need at the time. My plan is to code this entirely
	  by hand. Also, I am avoiding any cookies or trackers that are ubiquitous
	  in the modern web. The visit counter is implemented in PHP and does not
	  save any information about the visitor.
	</p>
	<p>
	  This site is a work in progress. For now:
	</p>
	<ul>
	  <li><a href="/blog/">Check out my Blog</a></li>
	  <li>Slowly adding some <a href="/recipes/">recipes</a></li>
          <li>Play <a href="/games/">browser games</a></li>
	</ul>

	<h2>
	  <i class="fa-solid fa-universal-access" aria-hidden="true"></i>
	  Accessibility
	</h2>
	<p>
	  Accessibility is important to me, and I am striving to make this site
	  compliant with the <a href="https://www.w3c.org/TR/WCAG22/">WCAG 2.2</a>
	  guidelines at the AA level or above. So far I have run a couple of automated
	  accessibility checkers on my site as well as manually tested using the
	  NVDA screen reader and keyboard-only navigation. The site currently does not
	  have any audio or video content, but if I add them I will be sure to include
	  transcripts and captioning.
	</p>
	<p>
	  If you have trouble accessing any part of the site, please let me know at
	  <a href="mailto:keydelk@sdf.org">keydelk@sdf.org</a>, and I will attempt to
	  fix the issue in the next update. This email is only used for site maintenance,
	  and does not accept any pictures or attachments. Personal communications should
	  be sent to my personal email.
	</p>
	<p>🐘 Follow me on <a rel="me" href="https://fosstodon.org/@keydelk">Mastodon</a>
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
