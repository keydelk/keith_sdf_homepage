<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Confirmagion</title>
    <meta name="keywords" content="Tilly, graduation">
    <meta name="description" content="Tilly's Graduation. Columbine High School class of 2025">
    <meta name="author" content="Keith Keydel">
    <link rel="stylesheet" href="../css/simple.css">
    <link rel="stylesheet" href="../css/customizations.css">
  </head>
  <body>
    <header>
      <h1 class="cursive">Tilly Keydel</h1>
      <p>Columbine High School class of 2025</p>
    </header>
    <main>
      
<?php
  $rsvp = $_POST["name"] . "," . $_POST["attending"] . "," .
          $_POST["dietary"] . "," . $_POST["email"] . "\n";
  $guest_list = fopen("guest_list.txt", "a")  or die("Error opening file.");
  fwrite($guest_list, $rsvp);
  fclose($guest_list);
  echo("<h2>Success</h2>");
  
?>

      <a href="index.html">Return to Tilly's Graduation Page</a>
    </main>
  </body>
</html>