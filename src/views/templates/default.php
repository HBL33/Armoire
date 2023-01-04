<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="le contenu de mon armoire dans une application web mobile">
  <title><?php if (isset($title)) : ?>
      <?= $title; ?>
    <?php else : ?>
      Mon site
    <?php endif ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="/public/image/mon_armoire.ico">
  <script src="https://kit.fontawesome.com/904a49c7aa.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require_once './src/views/includes/header.php';

  ?>
  <div class="container">
    <div class="content">
      <?= $content; ?>
    </div>
  </div>

  <?php
  require './src/views/includes/footer.php';
  ?>
</body>

</html>