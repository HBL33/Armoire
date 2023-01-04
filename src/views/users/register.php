<div class="col-md-6 ">
  <form class="hb-form" action="index.php?page=register" method="POST">
    <h2>Inscription</h2>
    <input class="hb-form-control" type="text" name="firstname" id="firstname" placeholder="Prénom">
    <input class="hb-form-control" type="text" name="lastname" id="lastname" placeholder="Nom">
    <input class="hb-form-control" type="email" name="email" id="email" placeholder="Email">
    <input class="hb-form-control" type="password" name="password" id="password" placeholder="Mot de passe">
    <?php if ($error) : ?>
      <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <div class="text-end">
      <button class="btn btn-secondary" type="submit">Valider</button>
    </div>
  </form>
</div>