<div class="hb-form col-md-6">
  <div>
    <!-- formulaire de saisie -->
    <?php
    $id = $_GET['id'] ?? '';
    ?>
    <form action="index.php?page=form-clothes<?= $id ? "&id=$id " : '' ?>" method="POST" enctype="multipart/form-data">
      <h2 class="fw-bolder"><?= $id ? 'Modifier ' : 'Ajouter un article' ?><?= $dress ?? '' ?></h2>
      <!-- image -->
      <div class="row">
        <div class="col-md-12">
          <label>sélectionnez l'image de votre article</label>
          <input class="hb-form-control" type="file" name="file" capture="environment">
        </div>
      </div>
      <!-- nom du vêtement -->
      <div class="row">
        <div class="col-md-6">
          <div>
            <?php if ($error['dress']) : ?>
              <p class="text-danger"><?= $error['dress'] ?></p>
            <?php endif; ?>
            <label class="">Marque de votre article</label>
            <input class="hb-form-control py-1 mt-1" type="text" name="dress" value="<?= $dress ?? '' ?>" placeholder="mini 3 caractères">
          </div>
        </div>
        <!-- Saisons -->
        <div class="col-md-3">
          <label class="mt-1">Saisons</label>
          <select class="form-select hb-form-control" name="seasons">
            <option <?= !$seasons || $seasons === "été" ? 'selected' : '' ?> value='<?= $seasons ?? '' ?>'><?= $seasons ?? 'été' ?><?= !$seasons || $seasons === "summer" ? $seasons : '' ?></option>
            <option <?= $seasons === "summer" ? 'selected' : '' ?> value="été">été</option>
            <option <?= $seasons === "autumn" ? 'selected' : '' ?> value="Automne">Automne</option>
            <option <?= $seasons === "winter" ? 'selected' : '' ?> value="Hiver">Hiver</option>
            <option <?= $seasons === "spring" ? 'selected' : '' ?> value="Printemps">Printemps</option>
            <option <?= $seasons === "All" ? 'selected' : '' ?> value="Toutes">Toutes</option>
          </select>
        </div>
        <div class="col-md-3">
          <!-- Accessoires -->
          <div>
            <label class="mt-1">couleurs</label>
            <select class="form-select hb-form-control" name="colors">
              <option <?= !$colors || $colors === "Blanc" ? 'selected' : '' ?> value='<?= $colors ?? 'Blanc' ?>'><?= $colors ?? '' ?><?= !$colors || $colors === "white" ? $colors : '' ?></option>
              <option <?= $colors === "white" ? 'selected' : '' ?> value="Blanc">Blanc</option>
              <option <?= $colors === "black" ? 'selected' : '' ?> value="Noir">Noir</option>
              <option <?= $colors === "grey" ? 'selected' : '' ?> value="Gris">Gris</option>
              <option <?= $colors === "Ecru" ? 'selected' : '' ?> value="Ecru">Ecru</option>
              <option <?= $colors === "blue" ? 'selected' : '' ?> value="Bleu">Bleu</option>
              <option <?= $colors === "green" ? 'selected' : '' ?> value="Vert">Vert</option>
              <option <?= $colors === "brown" ? 'selected' : '' ?> value="Marron">Marron</option>
              <option <?= $colors === "salmon" ? 'selected' : '' ?> value="Saumon">Saumon</option>
              <option <?= $colors === "yellow" ? 'selected' : '' ?> value="Jaune">Jaune</option>
              <option <?= $colors === "beige" ? 'selected' : '' ?> value="Beige">Beige</option>
              <option <?= $colors === "red" ? 'selected' : '' ?> value="Rouge">Rouge</option>
              <option <?= $colors === "orange" ? 'selected' : '' ?> value="Orange">Orange</option>
              <option <?= $colors === "pink" ? 'selected' : '' ?> value="Rose">Rose</option>
              <option <?= $colors === "purple" ? 'selected' : '' ?> value="Pourpre">Pourpre</option>
              <option <?= $colors === "violet" ? 'selected' : '' ?> value="Mauve">Mauve</option>
              <option <?= $colors === "silver" ? 'selected' : '' ?> value="Argent">Argent</option>
              <option <?= $colors === "golden" ? 'selected' : '' ?> value="Doré">Doré</option>
              <option <?= $colors === "motley" ? 'selected' : '' ?> value="Imprimé">Imprimé</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Modèle -->
      <div class="row">
        <div class="col-md-8">
          <?php if ($error['model']) : ?>
            <p class="text-danger"><?= $error['model'] ?></p>
          <?php endif; ?>
          <label class="mt-1">Choisissez la catégorie</label>
          <select class="form-select hb-form-control" name="model">
            <option <?= !$model || $model === "Bermuda" ? 'selected' : '' ?> value="<?= $model ?? '' ?>"><?= $model ?? 'Bermuda' ?><?= !$model || $model === "bermuda" ? $model : '' ?></option>
            <option <?= $model === "bermuda" ? 'selected' : '' ?> value="Bermuda">Bermuda</option>
            <option <?= $model === "bijoux" ? 'selected' : '' ?> value="Bijoux">Bijoux</option>
            <option <?= $model === "blouson" ? 'selected' : '' ?> value="blouson">Blouson</option>
            <option <?= $model === "ceinture" ? 'selected' : '' ?> value="Ceinture">Ceintures</option>
            <option <?= $model === "chaussures" ? 'selected' : '' ?> value='Chaussures'>Chaussures</option>
            <option <?= $model === "chemise" ? 'selected' : '' ?> value="chemise">Chemise</option>
            <option <?= $model === "chemisier" ? 'selected' : '' ?> value="chemisier">Chemisier</option>
            <option <?= $model === "combinaison" ? 'selected' : '' ?> value="combinaison">Combinaison</option>
            <option <?= $model === "costume" ? 'selected' : '' ?> value="costume">Costume</option>
            <option <?= $model === "debardeur" ? 'selected' : '' ?> value='debardeur'>Débardeur</option>
            <option <?= $model === "Gilet" ? 'selected' : '' ?> value="Gilet">Gilet</option>
            <option <?= $model === "haut" ? 'selected' : '' ?> value="haut">Haut</option>
            <option <?= $model === "impermeable" ? 'selected' : '' ?> value="impermeable">Imperméable</option>
            <option <?= $model === "Jeans" ? 'selected' : '' ?> value="Jeans">Jeans</option>
            <option <?= $model === "Jogging" ? 'selected' : '' ?> value="Jogging">Jogging</option>
            <option <?= $model === "jupe" ? 'selected' : '' ?> value="Jupe">Jupes</option>
            <option <?= $model === "manteau" ? 'selected' : '' ?> value="Manteau">Manteau</option>
            <option <?= $model === "pantalon" ? 'selected' : '' ?> value="Pantalon">Pantalon</option>
            <option <?= $model === "Pantacourt" ? 'selected' : '' ?> value="pantacourt">Pantacourt</option>
            <option <?= $model === "Polo" ? 'selected' : '' ?> value="polo">Polo</option>
            <option <?= $model === "pull" ? 'selected' : '' ?> value="Pull">Pull</option>
            <option <?= $model === "robe" ? 'selected' : '' ?> value="Robe">Robe</option>
            <option <?= $model === "sac" ? 'selected' : '' ?> value="Sac">Sac</option>
            <option <?= $model === "Salopette" ? 'selected' : '' ?> value="Salopette">Salopette</option>
            <option <?= $model === "Sous-vetement" ? 'selected' : '' ?> value="Sous-vetement">Sous-vêtement</option>
            <option <?= $model === "short" ? 'selected' : '' ?> value="Short">Short</option>
            <option <?= $model === "tee-shirt" ? 'selected' : '' ?> value="Tee-shirts">Tee-shirt</option>
            <option <?= $model === "Tenue de soirée" ? 'selected' : '' ?> value="Tenue de soirée">Tenue de soirée</option>
            <option <?= $model === "veste" ? 'selected' : '' ?> value="Veste">Veste</option>
          </select>
        </div>
        <!-- Tailles -->
        <div class="col-md-4">
          <label class="mt-1">Tailles</label>
          <select class="form-select hb-form-control" name="sizes">
            <option <?= !$sizes || $sizes === "XS" ? 'selected' : '' ?> value="<?= $sizes ?? '' ?>"><?= $sizes ?? 'XS' ?><?= !$sizes || $sizes === "XS" ? $sizes : '' ?></option>
            <option <?= $sizes === "XS" ? 'selected' : '' ?> value="XS">XS</option>
            <option <?= $sizes === "S" ? 'selected' : '' ?> value="S">S</option>
            <option <?= $sizes === "L" ? 'selected' : '' ?> value="L">L</option>
            <option <?= $sizes === "XL" ? 'selected' : '' ?> value="XL">XL</option>
            <option <?= $sizes === "XXL" ? 'selected' : '' ?> value="XXL">XXL</option>
            <option <?= $sizes === "17" ? 'selected' : '' ?> value="17">17</option>
            <option <?= $sizes === "18" ? 'selected' : '' ?> value="18">18</option>
            <option <?= $sizes === "19" ? 'selected' : '' ?> value="19">19</option>
            <option <?= $sizes === "20" ? 'selected' : '' ?> value="20">20</option>
            <option <?= $sizes === "21" ? 'selected' : '' ?> value="21">21</option>
            <option <?= $sizes === "22" ? 'selected' : '' ?> value="22">22</option>
            <option <?= $sizes === "23" ? 'selected' : '' ?> value="23">23</option>
            <option <?= $sizes === "24" ? 'selected' : '' ?> value="24">24</option>
            <option <?= $sizes === "25" ? 'selected' : '' ?> value="25">25</option>
            <option <?= $sizes === "26" ? 'selected' : '' ?> value="26">26</option>
            <option <?= $sizes === "27" ? 'selected' : '' ?> value="27">27</option>
            <option <?= $sizes === "28" ? 'selected' : '' ?> value="28">28</option>
            <option <?= $sizes === "29" ? 'selected' : '' ?> value="29">29</option>
            <option <?= $sizes === "30" ? 'selected' : '' ?> value="30">30</option>
            <option <?= $sizes === "31" ? 'selected' : '' ?> value="31">31</option>
            <option <?= $sizes === "32" ? 'selected' : '' ?> value="32">32</option>
            <option <?= $sizes === "33" ? 'selected' : '' ?> value="33">33</option>
            <option <?= $sizes === "35" ? 'selected' : '' ?> value="35">35</option>
            <option <?= $sizes === "36" ? 'selected' : '' ?> value="36">36</option>
            <option <?= $sizes === "37" ? 'selected' : '' ?> value="37">37</option>
            <option <?= $sizes === "38" ? 'selected' : '' ?> value="38">38</option>
            <option <?= $sizes === "39" ? 'selected' : '' ?> value="39">39</option>
            <option <?= $sizes === "40" ? 'selected' : '' ?> value="40">40</option>
            <option <?= $sizes === "41" ? 'selected' : '' ?> value="41">41</option>
            <option <?= $sizes === "42" ? 'selected' : '' ?> value="42">42</option>
            <option <?= $sizes === "43" ? 'selected' : '' ?> value="43">43</option>
            <option <?= $sizes === "44" ? 'selected' : '' ?> value="44">44</option>
            <option <?= $sizes === "45" ? 'selected' : '' ?> value="45">45</option>
            <option <?= $sizes === "46" ? 'selected' : '' ?> value="46">46</option>
            <option <?= $sizes === "47" ? 'selected' : '' ?> value="47">47</option>
            <option <?= $sizes === "48" ? 'selected' : '' ?> value="48">48</option>
          </select>
        </div>
      </div>
      <!--Description Vêtement -->
      <div>
        <label class=" py-1 mt-1">Décrivez votre article</label>
      </div>
      <div>
        <textarea class="hb-form-control py-1" name="content" id="content" placeholder="Décrivez le vêtement avec minimum 5 caractères"><?= $content ?? '' ?></textarea>
        <?php if ($error['content']) : ?>
          <p class="text-danger"><?= $error['content'] ?></p>
        <?php endif; ?>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-secondary"><?= $id ? 'Modifier votre article' : 'Ajouter à votre armoire' ?></button>
      </div>
    </form>
  </div>
</div>