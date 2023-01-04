<?php
require_once './src/models/database.php';

if (isset($_FILES['file'])) {
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $maxSize = 4000000;

    if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName . "." . $extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, './upload/' . $file);

        $req = $pdo->prepare('INSERT INTO upload_file (name) VALUES (?)');
        $req->execute([$file]);

        echo "Image enregistrée";
    } else {
        echo "Une erreur est survenue";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
    <h2>Mes images</h2>
    <?php
    $req = $pdo->query('SELECT name from upload_file');
    while ($data = $req->fetch()) {
        echo '<img src="./upload/' . $data['name'] . '" width="200px">';
    }
    ?>
</body>

</html>