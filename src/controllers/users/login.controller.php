<?php
require './src/models/database.php';

$error = [
  'firstname' => "",
  'lastname' => "",
  'email' => ""
];

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'email' => FILTER_SANITIZE_EMAIL,
  ]);
  $email = $input['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (!$email || !$password) {
    $error = 'Veuillez renseigner les champs';
  } else {

    $statementUser = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $statementUser->bindValue('email', $email);
    $statementUser->execute();
    $user = $statementUser->fetch();
    if (password_verify($password, $user['password'])) {
      $sessionId = bin2hex(random_bytes(32));
      $signature = hash_hmac('sha256', $sessionId, 'mfpqj\'a20aeT1!');

      $statementSession = $pdo->prepare('INSERT INTO session VALUES (:sessionid, :userid )');
      $statementSession->bindValue(':sessionid', $sessionId);
      $statementSession->bindValue(':userid', $user['id']);
      $statementSession->execute();
      // $sessionId = $pdo->lastInsertId();
      setcookie('signature', $signature,  time() + 60 * 60 * 24 * 14, "", "", false, true);
      setcookie('session', $sessionId, time() + 60 * 60 * 24 * 14, "", "", false, true);
      header('Location:index.php?page=dressing');
    } else {
      $error = 'identifiant/mot de passe invalide';
    }
  }
}
