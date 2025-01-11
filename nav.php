<?php
function aria_current( $url ) {
    // If $url is an exact match for the current URL, return
    // 'aria-current="page".
    if ($_SERVER['REQUEST_URI'] === $url) {
        echo 'aria-current="page"';
        return;
    }

    // Otherwise check if it's a sub-page
    if ($url !== '/' && strpos($_SERVER['REQUEST_URI'], $url) !== false) {
        echo 'aria-current="true"';
        return;
    }
}
?>

<a href="#main" class="skip">Skip to main content</a>
<nav>
    <a href="/" <?php aria_current('/') ?>>Home</a>
    <a href="/blog" <?php aria_current('/blog') ?>>Blog</a>
    <a href="/about.php" <?php aria_current('/about.php') ?>>About</a>
    <a href="/Tilly_Graduation/index.html">Tilly's Graduation</a>
</nav>