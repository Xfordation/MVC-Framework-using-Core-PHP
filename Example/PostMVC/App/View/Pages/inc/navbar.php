
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container">  
<a class="navbar-brand" href="<?php echo URL_ROOT; ?>"><?php echo SITE_NAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample05">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL_ROOT; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT; ?>/pages/about">About</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if (isset($_SESSION["user_ID"])): ?>
      
        <li class="nav-item">
        <a class="nav-link">Welcome, <?php echo $_SESSION[
          "user_NAME"
        ]; ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/logout">Logout <span class="sr-only">(current)</span></a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/register">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/login">Login</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  </div>
</nav>