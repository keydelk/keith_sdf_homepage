<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <!-- Add Title -->
  <title>Title</title>
  <meta name="author" content="Keith Keydel">
  <link rel="stylesheet" href="../css/simple.css">
  <link rel="stylesheet" href="../css/customizations.css">
  <link rel="stylesheet" href="/fa/css/all.min.css">
  <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg">
  <link rel="shortcut icon" href="/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-title" content="Keith's SDF">
  <link rel="manifest" href="/favicon/site.webmanifest">
</head>

<body>
  <header>
    <?php include "../nav.php" ?>

    <!-- Include Title in H1-->
    <h1>Recipe title</h1>
  </header>
  <main id="main">
    <!-- MAIN CONTENT HERE -->
     <h2 id="description">Description</h2>

     <br>
     <h3 id="ingredients">Ingredients</h3>
     <ul>
      <li></li>
     </ul>

     <br>
     <h3 id="directions">Directions</h3>
     <ol>
      <li></li>
     </ol>

    <br>
    <a href="index.php" class="button">&larr; Back to all recipes</a>
  </main>
  <footer>
    <p>Author: Keith Keydel</p>
    <!-- DON'T FORGET TO UPDATE THE DATE (both datetime attribute and display value) -->
    <p>Last Updated: <time datetime="2025-01-06">Month Day, Year</time></p>
    <p>
      Hosting for this site is provided by
      <a target=new href="http://sdf.org">The SDF Public Access UNIX System</a>
    </p>
  </footer>
</body>

</html>
