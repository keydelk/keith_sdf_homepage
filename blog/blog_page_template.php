<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <!-- Add Title -->
    <title>Title</title>
    <meta name="author" content="Keith Keydel">
    <link rel="stylesheet" href="../css/simple.css">
    <link rel="stylesheet" href="../css/customizations.css">
  </head>
  <body>
    <header>
      <?php include "../nav.php" ?>

      <!-- Include Title in H1-->
      <h1>Blog title</h1>
    </header>
    <main>
      <!-- MAIN CONTENT HERE -->
      <a href="index.php" class="button">&larr; Back to the blog</a>
    </main>
    <footer>
      <p>Author: Keith Keydel</p>
      <!-- DON'T FORGET TO UPDATE THE DATE (both datetime attribute and display value) -->
      <p>Last Updated: <time datetime="2025-01-06">1/6/2025</time></p>
      <p>
			Hosting for this site is provided by 
			<a target=new href="http://sdf.org">The SDF Public Access UNIX System</a>
		</p>
    </footer>
  </body>
</html>
