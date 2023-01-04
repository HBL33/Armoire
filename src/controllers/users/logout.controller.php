<?php
require './src/models/database.php';

$sessionId = $_COOKIE['session'] ?? '';

if ($sessionId) {
  $statement = $pdo->prepare('DELETE FROM session WHERE id = ? ');
  $statement->execute([$sessionId]);
  setcookie('session', "", time() - 1);
  setcookie('signature', '');
}
