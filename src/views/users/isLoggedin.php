<?php
function isLoggedin()
{
  $pdo = require './src/models/database.php';
  $sessionId = $_COOKIE['session'] ?? '';
  $signature = $_COOKIE['signature'] ?? '';
  if ($sessionId && $signature) {
    $hash = hash_hmac('sha256', $sessionId, 'mfpqj\'a20aeT1!');
    if (hash_equals($hash, $signature)) {
      $statementSessionsUser = $pdo->prepare('SELECT * FROM session JOIN user on user.id = session.iduser WHERE session.id = ?');
      $statementSessionsUser->execute([$sessionId]);
      $currentUser = $statementSessionsUser->fetch();
    }
  }

  return $currentUser ?? false;
}
