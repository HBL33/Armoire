<?php

$dns = 'mysql:host=******************;dbname=***************';
$user = '*********';
$pwd = '***********';
try {
  $pdo = new PDO($dns, $user, $pwd, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);
  // echo 'Connexion réussie';
} catch (PDOException $e) {
  echo 'error' . $e;
}
// ici on demmare la connection
return $pdo;
