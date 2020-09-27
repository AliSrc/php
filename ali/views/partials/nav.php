
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link <?php echo isActive('') ?>" href="/">Home</a>
      <a class="nav-item nav-link <?php echo isActive('users') ?>" href="/users">Users</a>
      <a class="nav-item nav-link <?php echo isActive('menu') ?>" href="/menu">Menu</a>
      <a class="nav-item nav-link <?php echo isActive('about') ?>" href="/about">About Us</a>
      <a class="nav-item nav-link <?php echo isActive('contact') ?>" href="/contact">Contact Us</a>
    </div>
  </div>
</nav>
