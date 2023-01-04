<?php

$currentUser = isLoggedin();

if (!$currentUser) {
  header('location: index.php?page=home');
}
