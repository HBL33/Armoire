<?php
require_once './src/models/database.php';
$title = "page inscription";
// penser à ajouter les filtres de carractères
const ERROR_REQUIRED = 'Veuillez renseigner le champ';
const ERROR_TYPE_TOO_SHORT = 'Veuillez entrer au moins 3 caractères';
const ERROR_EMAIL_REQUIRED = 'Veuillez renseigner une adresse mail valide';
// ici le tableau pour indiquer l'erreur en fonction de l'input si le champs est vide
$error = [
  'firstname' => "",
  'lastname' => "",
  'email' => "",
  'password' => ""
];

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
    'lastname' =>  FILTER_SANITIZE_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
  ]);

  $firstname = $input['firstname'] ?? '';
  $lastname = $input['lastname'] ?? '';
  $email = $input['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (!$firstname || !$lastname || !$email || !$password) {
    $error = 'Veuillez bien remplir les champs!';
  } else {
    $hashedPassword =  password_hash($password, PASSWORD_ARGON2ID);
    $statement = $pdo->prepare('INSERT INTO user VALUES (
  DEFAULT,
  :firstname,
  :lastname,
  :email,
  :password
)');
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hashedPassword);
    $statement->execute();
    header('location:index.php?page=dressing');
  }
}
