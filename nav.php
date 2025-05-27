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
  <ul role="menubar" class="nav-menu">
    <li class="nav-item">
      <a href="/" role="menuitem" class="nav-link" <?php aria_current('/') ?>>Home</a>
    </li>
    <li class="nav-item">
      <a href="/recipes" role="menuitem" class="nav-link" <?php aria_current('/recipes') ?>>Recipes</a>
    </li>
    <li>
      <a href="/games" role="menuitem" class="nav-link" <?php aria_current('/games') ?>>Games</a>
    </li>
    <li class="nav-item">
      <a href="/blog" role="menuitem" class="nav-link" <?php aria_current('/blog') ?>>Blog</a>
    </li>
    <li class="nav-item">
      <a href="/about.php" role="menuitem" class="nav-link" <?php aria_current('/about.php') ?>>About</a>
    </li>
  </ul>
</nav>
