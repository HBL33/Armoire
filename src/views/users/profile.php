<div class="col-md-6 ">
  <div class="hb-form ">
    <h1>Bienvenue <?= $currentUser['firstname'] ?></h1<br>
      <h2 class="my-3">Vos informations</h2>
      <div class="d-flex align-item-start mt-3">
        <label>Prénom: </label>
        <p> <?= $currentUser['firstname'] ?></p>
      </div>
      <div class="d-flex align-item-start my-3">
        <label>Nom: </label>
        <p> <?= $currentUser['lastname'] ?></p>
      </div>
      <div class="d-flex align-item-start mb-3">
        <label>Email: </label>
        <p> <?= $currentUser['email'] ?></p>
      </div>
      <a href="index.php?page=logout">
        <button type="submit" class="btn btn-secondary mt-3">Deconnexion</button>
      </a>
      <a href="/index.php?page=mentions-legales">Mentions légales</a>
  </div>
</div>