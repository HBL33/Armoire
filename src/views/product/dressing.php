<div class="col-md-12">
  <h1 class="text-center my-3 text-uppercase">Bienvenue dans votre armoire <?= $currentUser['firstname'] ?>!</h1>
  <a class="text-center btn btn-light nav-link sticky-top" href="index.php?page=form-clothes">Ajouter des vêtements</a>
  <div class="d-flex flex-wrap justify-content-start">
    <!-- ici une boucle pour récupérer un article dans clothes gràce à l'id -->
    <?php foreach ($articles as $article => $afficheArticles) : ?>
      <a class="text-decoration-none text-muted" href="index.php?page=dress&id=<?= $afficheArticles['id'] ?>">
        <div class="d-flex justify-content-start">
          <div class="article card">
            <div class="img-fluid">
              <img class="rounded mx-auto d-block py-2" width="100px" height="150px" src="<?= './upload/' . $afficheArticles['filename'] ?>">
            </div>
            <div class="card-body">
              <h3 class="card-title text-uppercase"><?= $afficheArticles['model'] ?></h3>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <div>
    <form method="POST" action="index.php?page=dressing&id=' . $id">
      <div class="row d-flex justify-content-center">
        <div class="col-md-1"></div>
        <div class="col-md-3 select">
          <legend>Saisons</legend>
          <fieldset class="scrollcheck">
            <div>
              <input class="seasons" type="checkbox" id="seasons" onclick="cocherToutSaisons(this.checked)" name="choice[]" value="Saisons">
              <label for="allSeasons">Toutes les saisons</label>
            </div>
            <div>
              <input class="seasons" type="checkbox" id="seasons" name="choice[]" value="Eté">
              <label for="summer">Eté</label>
            </div>
            <div>
              <input class="seasons" type="checkbox" id="seasons" name="choice[]" value="Automne">
              <label for="autumn">Automne</label>
            </div>
            <div>
              <input class="seasons" type="checkbox" id="seasons" name="choice[]" value="Hiver">
              <label for="winter">Hiver</label>
            </div>
            <div>
              <input class="seasons" type="checkbox" id="seasons" name="choice[]" value="Printemps">
              <label for="spring">Printemps</label>
            </div>
          </fieldset>
          <!-- <button class="btn btn-secondary" type="submit" value="Valider">Validez</button> -->
        </div>
        <div class="col-md-3  select">
          <legend>Couleurs</legend>
          <fieldset class="scrollcheck">
            <div>
              <input class="color" type="checkbox" id="allColors" onclick="cocherToutCouleurs(this.checked)" name="choice" value="Couleurs">
              <label for="allColors">Toutes les couleurs</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="white" name="choice" value="blanc">
              <label for="white">Blanc</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="black" name="choice" value="Noir">
              <label for="black">Noir</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="blue" name="choice" value="Bleu">
              <label for="blue">Bleu</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="grey" name="choice" value="Gris">
              <label for="grey">Gris</label>
            </div>
            <div>

              <input class="color" type="checkbox" id="green" name="choice" value="Vert">
              <label for="green">Vert</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="Ecru" name="choice" value="Ecru">
              <label for="yellow">Jaune</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="brown" name="choice" value="Marron">
              <label for="brown">Marron</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="salmon" name="choice" value="Saumon">
              <label for="salmon">Saumon</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="Yellow" name="choice" value="Jaune">
              <label for="Yellow">Jaune</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="beige" name="choice" value="Beige">
              <label for="beige">Beige</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="red" name="choice" value="Rouge">
              <label for="red">Rouge</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="orange" name="choice" value="Orange">
              <label for="orange">Orange</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="pink" name="choice" value="Rose">
              <label for="pink">Rose</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="purple" name="choice" value="Pourpre">
              <label for="purple">Pourpre</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="violet" name="choice" value="Mauve">
              <label for="violet">Mauve</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="silver" name="choice" value="Argent">
              <label for="silver">Argent</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="golden" name="choice" value="Doré">
              <label for="golden">Doré</label>
            </div>
            <div>
              <input class="color" type="checkbox" id="motley" name="choice" value="Imprimé">
              <label for="motley">Imprimé</label>
            </div>
          </fieldset>
          <!-- <button class="btn btn-secondary" type="submit" value="Valider">Validez</button> -->
        </div>
        <div class="col-md-3 mx-3 select">
          <legend>Modèles</legend>
          <fieldset class="scrollcheck">
            <div>
              <input class="model" type="checkbox" onclick="cocherToutModeles(this.checked)" id="allModels" name="choice" value="Modèles">
              <label for="allModels">Tous les Modèles</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="tops" name="choice" value="Haut">
              <label for="Haut">Haut</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="bottoms" name="choice" value="Bas">
              <label for="Bas">Bas</label>
            </div>
            <div>
              <input class="model" class="model" type="checkbox" id="pants" name="choice" value="Pantalon">
              <label for="pants">Pantalon</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="dresses" name="choice" value="Robe">
              <label for="dresses">Robe</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="skirts" name="choice" value="Jupe">
              <label for="skirts">Jupe</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="shorts" name="choice" value="Short">
              <label for="short">Short</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="tee-shirts" name="choice" value="Tee-shirt">
              <label for="tee-shirts">Tee-shirt</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="jackets" name="choice" value="Veste">
              <label for="jackets">Veste</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="coats" name="choice" value="Manteau">
              <label for="coats">Manteau</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="sweats" name="choice" value="Pull">
              <label for="sweats">Pull</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="shoes" name="choice" value="Chaussures">
              <label for="shoes">Chaussures</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="jeverly" name="choice" value="Bijoux">
              <label for="jeverly">Bijoux</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="bags" name="choice" value="Sac">
              <label for="bags">Sac</label>
            </div>
            <div>
              <input class="model" type="checkbox" id="belts" name="choice" value="Ceinture">
              <label for="belts">Ceinture</label>
            </div>
          </fieldset>
        </div>
        <div class="col-md-2 d-flex justify-content-center mt-4 me-2 p-1">
          <button class="btn btn-secondary" type="submit" value="Valider">Validez</button>
        </div>
    </form>
  </div>
</div>

<script src="/public/js/index.js"></script>
</div>