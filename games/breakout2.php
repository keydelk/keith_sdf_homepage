<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakout 2</title>
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
        header {
            position: static;
        }

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
        <h1>Breakout! Part 2</h1>
    </header>
    <main>
        <p>
            Previously, I made a breakout game following the Mozilla tutorial
            <a href="https://developer.mozilla.org/en-US/docs/Games/Tutorials/2D_Breakout_game_pure_JavaScript">2D breakout game using pure JavaScript</a>.
            However, there were some aspects of that game that I felt could be
            improved. In particular, the collision detection system treats the ball
            as a point located at it's center, meaning that sometimes it will 'miss'
            the ball or paddle, even when it looks like they collided on screen.
            I've also always thought that in breakout, the paddle should be able to impart
            some 'momentum' to the puck - change the velocity of the puck rather than just
            reversing the direction.
        </p>
        <p>
            The original game was also not really playable on mobile. While you could
            tap in the canvas area which could triger the mousemove event and move the
            paddle to the location, the motion was jumpy and not very playable.
        </p>
        <p>
            Finally, the game is pretty basic as is. Some addional features that could
            make the gameplay more interesting include:
        </p>
        <ul>
            <li>
                Infinite play - rather than the game ending when the last block
                is broken, what if we start a new 'level' with more blocks?
            </li>
            <li>
                Multi-hit blocks - what if as we go up in levels, the blocks take
                multiple hits to break? We could have the blocks change color, say
                moving around the spectrum from green to red as they get closer to
                breaking.
            </li>
            <li>
                High-score stored on the server - what if we save a list of high-scores
                on the server? If the user's score makes it to the top ten, we prompt
                for their name and save it along with their score and display it
                below the game area.
            </li>
        </ul>
        <p>
            To make implementing these changes easier, I'm also going to refactor
            the code to make it more Object Oriented. This will involve combining
            'loose' variables (e.g. ballRadius, x, y) into objects (ball.radius,
            ball.x, ball.y), making classes where there are multiple objects
            of a type (e.g. bricks). Basically, increasing usage of encapsulation,
            inheritance, polymorphism, and abstraction.
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

        const brickRowCount = 3;
        const brickColumnCount = 5;
        const brickWidth = 75;
        const brickHeight = 20;
        const brickPadding = 10;
        const brickOffestTop = 30;
        const brickOffestLeft = 30;

        let rightPressed = false;
        let leftPressed = false;

        let totalBrickHealth = brickRowCount * brickColumnCount;

        function randInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        function randSign() {
            if (Math.random() < 0.5) {
                return 1;
            } else {
                return -1;
            }
        }

        const player = {
            score: 0,
            lives: 3
        }

        const ball = {
            color: 'green',
            radius: 10,
            x: canvas.width / 2,
            y: canvas.height - 30,
            dx: randSign() * randInt(1, 3),
            dy: -2,

            getBottomY: function() {
                return this.y + this.radius;
            },

            getTopY: function() {
                return this.y - this.radius;
            },

            getLeftX: function() {
                return this.x - this.radius;
            },

            getRightX: function() {
                return this.x + this.radius;
            },

            detectCollisions: function() {
                // check if colliding with edges
                if (this.getLeftX() < 0 || this.getRightX() > canvas.width) {
                    this.dx *= -1;
                }
                if (this.getTopY() < 0) { // Only top
                    this.dy *= -1;
                    // check if colliding with paddle. Since the ball is moving down we're only
                    // going to test the top edge of the paddle.
                } else if (this.getRightX() >= paddle.x &&
                           this.getLeftX() <= paddle.x + paddle.width &&
                           this.getBottomY() >= paddle.y &&
                           this.y <= paddle.y) {
                    this.dy *= -1;
                } else {
                    // check for collison with bricks
                    for (let c = 0; c < brickColumnCount; c++) {
                        for (let r = 0; r < brickRowCount; r++) {
                            const b = bricks[c][r];
                            if (b.status > 0) {
                              if (this.getRightX() > b.x &&
                                  this.getLeftX() < b.x + brickWidth &&
                                  this.getBottomY() > b.y &&
                                  this.getTopY() < b.y + brickHeight) {
                                    this.dy *= -1;
                                    b.status -= 1;
                                    player.score += 50;
                                    totalBrickHealth -= 1;
                                    return;
                                }
                            }
                        }
                    }
                }
            },

            draw: function() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            },

            move: function() {
                this.x += this.dx;
                this.y += this.dy;
                this.detectCollisions();
            },

            reload: function() {
                this.x = canvas.width / 2
                this.y = canvas.height - 30;
                this.dx = randSign() * randInt(1, 3);
                this.dy = -2;
            }
        }

        const paddle = {
            height: 10,
            width: 75,
            x: 200,
            y: 305,
            speed: 7,
            color: 'dodgerblue',

            draw: function() {
                ctx.beginPath();
                ctx.rect(this.x, this.y, this.width, this.height);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            },

            move: function() {
                if (rightPressed) {
                    this.x = Math.min(this.x + this.speed, canvas.width - this.width);
                }
                if (leftPressed) {
                    this.x = Math.max(this.x - this.speed, 0);
                }
            }
        }

        class Brick {
            constructor(x, y, status) {
                this.x = x;
                this.y = y;
                this.status = status;
                this.width = brickWidth;
                this.height = brickHeight;
                this.color = 'brown';
            }
            draw() {
                if (this.status > 0) {
                    ctx.beginPath();
                    ctx.rect(this.x, this.y, this.width, this.height);
                    ctx.fillStyle = this.color;
                    ctx.fill();
                    ctx.closePath();
                }
            }
        }

        const bricks = [];
        for (let c = 0; c < brickColumnCount; c++) {
            bricks[c] = [];
            for (let r = 0; r < brickRowCount; r++) {
                bricks[c][r] =
                    new Brick(c * (brickWidth + brickPadding) + brickOffestLeft,
                        r * (brickHeight + brickPadding) + brickOffestTop,
                        1
                    )
            }
        }

        function drawBricks() {
            for (let c = 0; c < brickColumnCount; c++) {
                for (let r = 0; r < brickRowCount; r++) {
                    bricks[c][r].draw();
                }
            }
        }

        function refreshBricks(n) {
            for (let c = 0; c < brickColumnCount; c++) {
                for (let r = 0; r < brickRowCount; r++) {
                    bricks[c][r].status = n;
                }
            }
            totalBrickHealth = brickRowCount * brickColumnCount * n;
        }

        function drawScore() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "navy";
            ctx.fillText(`Score: ${player.score}`, 8, 20);
        }

        function drawLives() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "navy";
            ctx.fillText(`Lives: ${player.lives}`, canvas.width - 65, 20);
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            paddle.move();
            paddle.draw();

            ball.move();
            ball.draw();

            drawBricks();

            drawScore();
            drawLives();

            if (totalBrickHealth < 1) {
                refreshBricks(1);
            }

            if (ball.y > canvas.height) {
                player.lives--;
                if (!player.lives) {
                    alert("Game Over!");
                    document.location.reload();
                } else {
                    ball.reload();
                }
            }
            requestAnimationFrame(draw);
        }

        function keyDownHandler(e) {
            if (e.key === "Right" || e.key === "ArrowRight") {
                rightPressed = true;
            }
            if (e.key === "Left" || e.key === "ArrowLeft") {
                leftPressed = true;
            }
        }

        function keyUpHandler(e) {
            if (e.key === "Right" || e.key === "ArrowRight") {
                rightPressed = false;
            }
            if (e.key === "Left" || e.key === "ArrowLeft") {
                leftPressed = false;
            }
        }

        function mouseMoveHandler(e) {
            const relativeX = e.clientX - canvas.offsetLeft;
            if (relativeX > 0 && relativeX < canvas.width) {
                paddle.x = relativeX - paddle.width / 2;
            }
        }

        function startGame() {
            document.addEventListener("keydown", keyDownHandler, false);
            document.addEventListener("keyup", keyUpHandler, false);
            document.addEventListener("mousemove", mouseMoveHandler, false);
            draw();
        }

        startButton = document.getElementById("startGame");

        startButton.addEventListener("click", function() {
            startGame();
            this.disabled = true;
        });
    </script>
</body>

</html>
