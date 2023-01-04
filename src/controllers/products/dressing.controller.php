<?php
$clothesDB = require_once './src/models/product/clothesDB.php';
// ici on récupère l'id de l'utilisateur
$userId = $currentUser['iduser'];
// ici on récupère tous les articles dans la variable articles
$articles = $clothesDB->fetchAll($userId);
$req = $pdo->query('SELECT * from fileName');
$data = $req->fetch();
// si il n'y a pas d'utilisateur alors on redirige vers la page connexion
if (!$currentUser) {
  header('location:index.php?page=login');
}
// $productId = $file['product_id']['name'];
// ici on recupere le cookie(miam!)
// ici on récupère le fichier json des choix 
if (isset($_COOKIE['nam'])) {
  $afficheArticles = json_decode($_COOKIE['nam']);
  // var_dump($afficheArticles);
}
