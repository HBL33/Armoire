<div class="row">
  <div class="col-md-12 d-flex justify-align-center my-5">
    <div class="card dress">
      <div class="row align-items-center">
        <!-- nom -->
        <h2 class="py-1 text-center text-uppercase"><?= $dress['dress'] ?></h2>
        <div class="col-md-6 text-center">
          <!-- image -->
          <a href="<?= './upload/' . $dress['filename'] ?>" rel=" zoombox[galerie]">
            <img class="img-fluid" src="<?= './upload/' . $dress['filename'] ?>" width="400px" rel="zoombox[galerie]">
          </a>
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <!-- modèle -->
            <label>Modèle</label>
            <p class=" py-1"><?= $dress['model'] ?></p>
            <!-- taille -->
            <label>Taille</label>
            <p class=" py-1"><?= $dress['sizes'] ?></p>
            <!-- couleur -->
            <label>Couleur</label>
            <p class=" py-1"><?= $dress['colors'] ?></p>
            <!-- saison -->
            <label>Saison</label>
            <p class=" py-1"><?= $dress['seasons'] ?></p>
            <!-- description -->
            <label>Description</label>
            <p><?= $dress['content'] ?></p>
          </div>
        </div>
      </div>
      <!-- ici les boutons modifier ou supprimer le velo qui nous envoi vers le formulaire ou l'index -->
      <div class="text-end mt-1 me-3">
        <a class="px-1" href="index.php?page=dressing">
          <button class="btn btn-secondary"><i class="fa-solid fa-circle-arrow-left px-2"></i></button></a>
        <a class="px-1" href="index.php?page=form-clothes&id=<?= $dress['id'] ?>">
          <button class="btn btn-secondary"><i class="fa-solid fa-sliders px-2"></i></button></a>
        <a class="px-1" href="index.php?page=remove-dress&id=<?= $dress['id'] ?>">
          <button class="btn btn-primary"><i class="fa-solid fa-trash-can px-2"></i></button>
        </a>
      </div>
    </div>
  </div>
</div>