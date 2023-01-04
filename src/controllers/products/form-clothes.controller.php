<?php

$clothesDB = require_once './src/models/product/clothesDB.php';
$title = "Ajouter un vêtement";
const ERROR_REQUIRED = 'Veuillez renseigner le champ';
const ERROR_TYPE_TOO_SHORT = 'Veuillez entrer au moins 3 caractères';
const ERROR_CONTENT_TOO_SHORT = 'Veuillez entrer au moins 5 caractères et maxi 50';
const ERROR_IMAGE_REQUIRED = 'Veuillez renseigner une URL d\' image valide';

$error = [
  'dress' => "",
  'model' => "",
  'content' => ""
];
require_once './src/views/users/isLoggedin.php';
$model = '';
$colors = '';
$sizes = '';
$seasons = '';
$currentUser = isLoggedin();

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';


// si on a une $id on lui dit de prendre seulement l'information $id dans la bdd et on l'a stock dans $clothes
if ($id) {
  $clothes = $clothesDB->fetchOne($id);
  //  on stock les inputs dans chacunes des variables correspondantes
  $dress = $clothes['dress'];
  $model = $clothes['model'];
  $content = $clothes['content'];
  $seasons = $clothes['seasons'];
  $colors = $clothes['colors'];
  $sizes = $clothes['sizes'];
}


//  si les infos récupérées avec le POST sont strictement égales au tableau contenant des informations comme les en-têtes, dossiers et chemins du script crées par le serveur web, dans ce cas, on fitre les infos du POST par input en vérifiant si il n'y a pa d'erreurs on envoi les infos vers la page index
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST = filter_input_array(
    INPUT_POST,
    [
      "dress" => FILTER_UNSAFE_RAW,
      "model" => FILTER_UNSAFE_RAW,
      "file" => FILTER_UNSAFE_RAW,
      "filename" => FILTER_UNSAFE_RAW,
      "seasons" => FILTER_UNSAFE_RAW,
      "sizes" => FILTER_UNSAFE_RAW,
      "colors" => FILTER_UNSAFE_RAW,
      "content" =>
      [
        "filter" => FILTER_UNSAFE_RAW,
        "flag" => FILTER_FLAG_NO_ENCODE_QUOTES
      ]
    ],
  );
  $dress = $_POST['dress'] ?? '';
  $file = $_POST['file'] ?? '';
  $filename = $_POST['filename'] ?? '';
  $productId = $_POST['product_id'] ?? '';
  $model = $_POST['model'] ?? '';
  $content = $_POST['content'] ?? '';
  $seasons = $_POST['seasons'] ??  '';
  $colors = $_POST['colors'] ?? '';
  $sizes = $_POST['sizes'] ?? '';

  if (!$dress) {
    $error['dress'] = ERROR_REQUIRED;
  } elseif (strlen($_POST['dress']) > 30 or strlen($_POST['dress']) < 3) {
    $error['dress'] = ERROR_TYPE_TOO_SHORT;
  }

  if (!$model) {
    $error['model'] = ERROR_REQUIRED;
  }

  if (!$sizes) {
    $error['sizes'] = ERROR_REQUIRED;
  }

  if (!$colors) {
    $error['colors'] = ERROR_REQUIRED;
  }

  if (!$seasons) {
    $error['seasons'] = ERROR_REQUIRED;
  }

  if (!$content) {
    $error['content'] = ERROR_REQUIRED;
  } elseif (strlen($_POST['content']) > 50 or strlen($_POST['content']) < 5) {
    $error['content'] = ERROR_CONTENT_TOO_SHORT;
  }

  // si un fichier est présent alors on récupère les infos et on découpe l'extension pour la vérifier et la comparer et la rajouter au nouveau nom du fichier si il correspond à la taille maximum et on créer un nom unique avec son extension d'origine avant de le télécharger dans le dossier upload et la bdd uniquement son nom

  if (!count(array_filter($error, fn ($e) => $e !== ''))) {
    if (isset($_FILES['file'])) {
      require("./src/models/product/imgClass.php");
      $tmpName = $_FILES['file']['tmp_name'];
      $name = $_FILES['file']['name'];
      $size = $_FILES['file']['size'];
      $error = $_FILES['file']['error'];
      $img = $_FILES['img'];
      $tabExtension = explode('.', $name);
      $extension = strtolower(end($tabExtension));
      $extensions = ['jpg', 'png', 'jpeg', 'gif'];
      $maxSize = 8000000;
      if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $filename = $uniqueName . "." . $extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './upload/' . $filename);
      }
    }
    if ($id) {
      $clothes['dress'] = $dress;
      $clothes['file'] = $file;
      $clothes['filename'] = $filename;
      $clothes['product_id'] = $productId;
      $clothes['model'] = $model;
      $clothes['content'] = $content;
      $clothes['seasons'] = $seasons;
      $clothes['colors'] = $colors;
      $clothes['sizes'] = $sizes;
      $clothesDB->updateOne($clothes);
      header('Location:index.php?page=dress&id=' . $id);
    } else {
      $clothesDB->createOne([
        'dress' => $dress,
        'file' => $file,
        'filename' => $filename,
        'product_id' => $productId,
        'model' => $model,
        'content' => $content,
        'seasons' => $seasons,
        'colors' => $colors,
        'sizes' => $sizes,
        'userid' => $currentUser['id'],
        header('Location:index.php?page=dressing')
      ]);
    }
  }
}
