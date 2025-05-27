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
        <h1>Breakout!</h1>
    </header>
    <main>
        <canvas id="myCanvas" width="480" height="320"></canvas>
        <br>
        <button id="startGame">Start Game</button>
        <br>
        <hr>
        <a href="index.php" class="button">&larr; Back Games Index</a>
    </main>
    <?php include "../footer.php" ?>
    <script>
        // Game code
        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext("2d");
        let interval = 0;
        let score = 0;
        let lives = 3;

        const ballRadius = 10;
        let x = canvas.width / 2;
        let y = canvas.height - 30;
        let dx = randSign() * randInt(1, 3);
        let dy = -2;

        const paddleHeight = 10;
        const paddleWidth = 75;
        let paddleX = (canvas.width - paddleWidth) / 2;
        let paddleY = (canvas.height - paddleHeight - 5);
        let paddleSpeed = 7;

        let rightPressed = false;
        let leftPressed = false;

        const brickRowCount = 3;
        const brickColumnCount = 5;
        const brickWidth = 75;
        const brickHeight = 20;
        const brickPadding = 10;
        const brickOffestTop = 30;
        const brickOffestLeft = 30;

        const bricks = [];
        for (let c = 0; c < brickColumnCount; c++) {
            bricks[c] = [];
            for (let r = 0; r < brickRowCount; r++) {
                bricks[c][r] = {
                    x: 0,
                    y: 0,
                    status: 1
                };
            }
        }

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

        function collisionDetection() {
            if (x > paddleX && x < paddleX + paddleWidth &&
                y > paddleY && y < paddleY + paddleHeight) {
                dy = -dy;
                return;
            }
            for (let c = 0; c < brickColumnCount; c++) {
                for (let r = 0; r < brickRowCount; r++) {
                    const b = bricks[c][r];
                    if (b.status > 0) {
                        if (x > b.x && x < b.x + brickWidth &&
                            y > b.y && y < b.y + brickHeight) {
                            dy = -dy;
                            b.status -= 1;
                            score += 50;
                            return;
                        }
                    }
                }
            }
        }

        function drawBall() {
            ctx.beginPath();
            ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
            ctx.fillStyle = "green";
            ctx.fill();
            ctx.closePath();
        }

        function drawPaddle() {
            ctx.beginPath();
            ctx.rect(paddleX, paddleY, paddleWidth, paddleHeight);
            ctx.fillStyle = "dodgerblue";
            ctx.fill();
            ctx.closePath();
        }

        function drawBricks() {
            for (let c = 0; c < brickColumnCount; c++) {
                for (let r = 0; r < brickRowCount; r++) {
                    if (bricks[c][r].status > 0) {
                        const brickX = c * (brickWidth + brickPadding) + brickOffestLeft;
                        const brickY = r * (brickHeight + brickPadding) + brickOffestTop;
                        bricks[c][r].x = brickX;
                        bricks[c][r].y = brickY;
                        ctx.beginPath();
                        ctx.rect(brickX, brickY, brickWidth, brickHeight);
                        ctx.fillStyle = "brown";
                        ctx.fill();
                        ctx.closePath();
                    }
                }
            }
        }

        function drawScore() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "navy";
            ctx.fillText(`Score: ${score}`, 8, 20);
        }

        function drawLives() {
            ctx.font = "16px Arial";
            ctx.fillStyle = "navy";
            ctx.fillText(`Lives: ${lives}`, canvas.width - 65, 20);
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            if (rightPressed) {
                paddleX = Math.min(paddleX + paddleSpeed, canvas.width - paddleWidth);
            }
            if (leftPressed) {
                paddleX = Math.max(paddleX - paddleSpeed, 0);
            }

            drawPaddle();
            collisionDetection();
            drawBricks();

            if (y + dy < ballRadius) {
                dy = -dy;
            }
            if (x + dx < ballRadius || x + dx > canvas.width - ballRadius) {
                dx = -dx;
            }
            x += dx;
            y += dy;

            drawBall();
            drawScore();
            drawLives();

            if (score === 50 * brickRowCount * brickColumnCount) {
                alert("You Win, Congratulations!");
                document.location.reload();
            }

            if (y > canvas.height) {
                lives--;
                if (!lives) {
                    alert("Game Over!");
                    document.location.reload();
                } else {
                    x = canvas.width / 2
                    y = canvas.height - 30;
                    dx = randSign() * randInt(1, 3);
                    dy = -2;
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
                paddleX = relativeX - paddleWidth / 2;
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
