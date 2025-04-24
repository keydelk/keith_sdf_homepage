<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakout</title>
    <meta name="keywords" content="games, Javascript">
    <meta name="description" content="A small collection of Javascript games">
    <meta name="author" content="Keith Keydel">
    <link rel="stylesheet" href="../css/simple.css">
    <link rel="stylesheet" href="../css/customizations.css">
    <link rel="stylesheet" href="/fa/css/all.min.css">
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Keith's SDF games">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <style>
     canvas {
       background: #ccc;
       display: block;
       margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <header>
      <?php include "../nav.php" ?>
      <h1>Breakout!</h1>
    </header>
    <main>
      <p>
	This breakout game is based on the tutorial, 
	<a href="https://developer.mozilla.org/en-US/docs/Games/Tutorials/2D_Breakout_game_pure_JavaScript">2D breakout game using pure JavaScript</a>
	by Mozilla.
      </p>
      <section id="gameArea">
	<canvas id="myCanvas" width="480" height="320"></canvas>
	<br>
	<button id="startGame">Start Game</button>
      </section>
      <br>
      <a href="index.php" class="button">&larr; Back Games Index</a>
    </main>
    <?php include "../footer.php" ?>
    <script>
     // Game code
     const canvas = document.getElementById("myCanvas");
     const ctx = canvas.getContext("2d");

     const ballRadius = 10;
     let x = canvas.width / 2;
     let y = canvas.height - 30;
     let dx = 2;
     let dy = -2;

     function drawBall() {
       ctx.beginPath();
       ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
       ctx.fillStyle = "green";
       ctx.fill();
       ctx.closePath();
     }

     function draw() {
       ctx.clearRect(0, 0, canvas.width, canvas.height);
       drawBall();
       if (y + dy < 0 || y + dy > canvas.height) {
	 dy = -dy;
       }
       if (x + dx < 0 || x + dx > canvas.width) {
	 dx = -dx;
       }
       x += dx;
       y += dy;
     }
     
     function startGame() {
       setInterval(draw, 10);
     }

     document.getElementById("startGame")
	     .addEventListener("click", function () {
	       startGame();
	       this.disabled = true;
	     });
    </script>
  </body>
</html>
