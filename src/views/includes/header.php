<nav class="navbar sticky-top navbar-expand-lg hb-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/public/image/logo-mon_armoire.jpg" alt="logo mon armoire"> MON ARMOIRE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/' ? 'anim-active' : '' ?>" href="/">ACCUEIL</a>
        </li>
        <?php if (!$currentUser) :  ?>
          <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/index.php?page=login' ? 'anim-active' : '' ?>">
            <a class="nav-link" href="index.php?page=login">CONNEXION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/index.php?page=register' ? 'anim-active' : '' ?>" href="index.php?page=register">INSCRIPTION</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/index.php?page=form-clothes' ? 'anim-active' : '' ?>" href="index.php?page=form-clothes">AJOUTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/index.php?page=dressing' ? 'anim-active' : '' ?>" href="index.php?page=dressing">MON ARMOIRE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/index.php?page=profile' ? 'anim-active' : '' ?>" href="index.php?page=profile">MON PROFIL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=logout">DECONNEXION</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>