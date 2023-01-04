<?php
// ici on indique le chemin vers le fichier contenant touts les requètes
$clothesDB = require_once './src/models/product/clothesDB.php';
require_once './src/views/users/isLoggedin.php';

// ici on filtre les infos récupérées
$_GET = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);
// on declare la valeur id si elle est renseignée
$id = $_GET['id'] ?? '';
// si on a un id renseigné on le stock dans $id

if ($id) {
  // on supprime l'article' renseigné par l'id dans la bdd
  unlink('./upload/' . $dress['filename']);
  $clothesDB->DeleteOne($id);
}
