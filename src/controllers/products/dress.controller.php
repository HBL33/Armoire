<?php

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
$clothesDB = require_once './src/models/product/clothesDB.php';
if (!$currentUser) {
  header('location:index.php?page=login');
} else {
  if (!$id) {
    header('location:index.php?page=home');
  } else {
    $dress = $clothesDB->fetchOne($id);
  }
}
