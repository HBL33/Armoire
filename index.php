<?php
require_once './src/models/database.php';
require_once './src/views/users/isLoggedin.php';
$currentUser = isLoggedin();
ob_start();

$page = 'home';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
switch ($page) {
  case 'home':
    $title = "Mon armoire";
    include './src/views/product/home.php';
    break;
  case 'dressing':
    $title = "Dans mon armoire";
    require_once './src/controllers/products/dressing.controller.php';
    include './src/views/product/dressing.php';
    break;
  case 'dress':
    $title = "Mon vêtement";
    require_once './src/controllers/products/dress.controller.php';
    include './src/views/product/dress.php';
    break;
  case 'profile':
    $title = "Profil";
    require_once './src/controllers/users/profile.controller.php';
    include './src/views/users/profile.php';
    break;
  case 'remove-dress':
    $title = "Supprimer";
    require_once './src/controllers/products/remove-dress.controller.php';
    include './src/views/product/remove-dress.php';
    break;
  case 'logout':
    $title = "Deconnexion";
    require_once './src/controllers/users/logout.controller.php';
    include './src/views/users/logout.php';
    break;
  case 'login':
    $title = "Connexion";
    require_once './src/controllers/users/login.controller.php';
    include './src/views/users/login.php';
    break;
  case 'register':
    $title = "Inscription";
    require_once './src/controllers/users/register.controller.php';
    include './src/views/users/register.php';
    break;
  case 'form-clothes':
    $title = "Insérer un vêtement";
    require_once './src/controllers/products/form-clothes.controller.php';
    include './src/views/product/form-clothes.php';
    break;
  case 'mentions-legales':
    $title = "Mentions légales";
    require_once './src/views/product/mentions-legales.php';
    break;
  default:
    $title = "Mon armoire";
    include './src/views/product/home.php';
    break;
}

$content = ob_get_clean();

ob_end_clean();

include './src/views/templates/default.php';
