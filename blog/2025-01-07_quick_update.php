<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <!-- Add Title -->
    <title>Quick Update before Work</title>
    <meta name="author" content="Keith Keydel">
    <link rel="stylesheet" href="../css/simple.css">
  </head>
  <body>
    <header>
      <?php include "../nav.php" ?>
      
      <!-- Include Title in H1-->
      <h1>A quick update before work</h1>
    </header>
    <main id="main">
      <!-- MAIN CONTENT HERE -->
       <h2>Trying to make a new habit</h2>
       <p>
        So, I'm trying to make this a new habit to write a little in my blog each day. 
        I'm hoping this can take the place of social media for me, and provide a little 
        motivaion for me to write more. I'm also planning on doing a little coding here 
        and publishing some little games (mostly Python, some JS browser games as well) 
        to my site.
       </p>
       <p>
        But today I don't have a lot  of time before work, and with the annual company 
        meeting, I probably will not have much energy afterwards. So I'll just publish 
        a little update today. I created a template HTML file for my blog enteries to 
        make it easier for me to update (rather than starting from scratch each day),
        and so I don't forget to update the date, etc. I added some comments.
       </p>
       <p>
        Moving forward I would like to add:
       </p>
       <ul>
        <li>Some code/tool automatically update the "Last Updated" date in the page footer.</li>
        <li>Code/tool to update the blog index.html file to automatically add new pages.</li>
        <li>Improved site navigation (perhaps making the nav element sticky)</li>
       </ul>
       <p>
        There will probably be more to come, but I think these are good next steps.
       </p>
      <a href="index.php" class="button">&larr; Back to the blog</a>
    </main>
    <footer>
      <p>Author: Keith Keydel</p>
      <!-- DON'T FORGET TO UPDATE THE DATE (both datetime attribute and display value) -->
      <p>Last Updated: <time datetime="2025-01-07">1/7/2025</time></p>
    </footer>
  </body>
</html>
