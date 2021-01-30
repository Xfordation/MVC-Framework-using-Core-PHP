<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <section class="container">
    <a class="navbar-brand" href="<?php echo URL_ROOT; ?>"><?php echo SITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>">Home</a>
        </li>
        <?php if (isLoggedInAsRestraunt()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/Restraunts/menu">Menu</a>
        </li>
        <?php endif; ?>
        <?php if (!isLoggedInAsRestraunt()): ?>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/pages/order">Order Now</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/pages/about">About</a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
      <?php if (isset($_SESSION["user_ID"])): ?>
          <li class="nav-item">
          <a class="nav-link">Welcome, <?php echo $_SESSION["user_NAME"]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/Users/logout">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/Users/register">Register <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/Users/login">Login</a>
        </li>
        <?php endif; ?>
        </ul>
    </div>
  </section>
</nav>