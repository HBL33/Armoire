<div class="col-md-4 ">
  <form class="hb-form" action="index.php?page=login" method="POST" autocomplete="off">
    <h2>Connectez-vous</h2>
    <input class="hb-form-control" type="email" name="email" id="email" placeholder="Email">
    <input class="hb-form-control" type="password" name="password" id="password" placeholder="Mot de passe">
    <?php if ($error) : ?>
      <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <div class="text-end">
      <button class="btn btn-secondary" type="submit">Connexion</button>
    </div>
  </form>
</div>