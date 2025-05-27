<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keith's Games</title>
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
</head>

<body>
    <header>
        <?php include "../nav.php" ?>

        <h1>Games <i class="fa-solid fa-gamepad"></i></h1>
    </header>
    <main id="main">
        <section id="quicklinks">
            <h2>Javascript Games</h2>
            <!-- ADD GAMES HERE! -->
            <ul>
                <li>
                    <a href="/games/breakout.php">Breakout</a>
                </li>
                <li>
                    <a href="/games/breakout2.php">Breakout 2</a>
                </li>
            </ul>
        </section>
        <section id="devlog">
            <h2>Development Logs</h2>
            <p>
                Initialy, I was including some development logs/commentary about
                each game on the page with the game itself. But this started to complicate
                making the games responsive for mobile, and the text may be a bit
                distracting in some cases. So, I decided to move the commentary here.
            </p>
            <article id="breakout">
                <h3>
                    <a href="/games/breakout.php">
                        Breakout
                    </a>
                </h3>
                <p>
                    This breakout game is based on the tutorial,
                    <a href="https://developer.mozilla.org/en-US/docs/Games/Tutorials/2D_Breakout_game_pure_JavaScript">2D breakout game using pure JavaScript</a>
                    by Mozilla.
                </p>
                <p>
                    Currently, this game is a pretty plain copy of the one in the
                    tutorial. I made a few minor changes from the tutorial (random
                    starting x velocity, paddle not at the very bottom of the screen),
                    but pretty close. Next, I'm planning on next making a more heavily
                    modified copy of the game jazzing it up a bit;
                    improving collison detection, making the bricks take multiple hits to break
                    (changing colors), possibly adding multiple balls.
                </p>
                <p>
                    Move the paddle with the left and right arrow keys.
                    Or use the mouse, the paddle tracks the cursor if it is within the
                    canvas area.
                    Currently the game is not playable on mobile.
                    The next version will have mobile support.
                </p>
            </article>
            <article id="breakout2">
                <h3>
                    <a href="/games/breakout2.php">Breakout 2</a>
                </h3>
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
                <p>
                    This is still a work in progress. Currently, I've done some of the refactoring,
                    added unlimited play (though blocks are still one hit only, it's just a line
                    of code to change that). I've fixed collision detection a bit, so it now
                    checks the outer edge of the ball rather than the middle. However, it is still
                    only bouncing vertically off the paddle and bricks. Mobile is work in progree.
                </p>
            </article>
        </section>
    </main>

    <?php include "../footer.php" ?>

</body>

</html>
