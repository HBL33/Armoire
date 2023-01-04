<?php
// ici on indique le chemin du fichier pour la connection a la bdd 
$pdo = require './src/models/database.php';
require_once './src/views/users/isLoggedin.php';

// ici on créer une class clothesBD
class clothesDB
{
  // Représente des instructions préparées et, une fois les instructions exécutées, un jeu de résultats associés a la classe clothesDB
  public  $statementCreateOne;
  public  $statementReadOne;
  public  $statementReadAll;
  public  $statementUpdateOne;
  public  $statementDeleteOne;
  //  ici on créer une fonction
  public function __construct($pdo)
  {
    // ici on se refère à l'objet et on prépare la requète
    $this->statementReadAll = $pdo->prepare('SELECT clothes.*, user.id as iduser FROM clothes LEFT JOIN user ON user.id = clothes.userid WHERE clothes.userid  = ?');
    $this->statementReadOne = $pdo->prepare('SELECT * FROM clothes WHERE id = ?');
    $this->statementDeleteOne = $pdo->prepare('DELETE FROM clothes WHERE id = ?');
    $this->statementUpdateOne = $pdo->prepare('UPDATE clothes
    SET 
     dress=:dress,
     file=:file,
     filename=:filename,
     product_id=:product_id,
     content=:content,
     model=:model,
     seasons=:seasons,
     sizes=:sizes,
     colors=:colors,
     userid=:userid
          
     WHERE id = :id
   ');
    $this->statementCreateOne = $pdo->prepare(
      'INSERT INTO clothes (
      dress,
      file,
      filename,
      product_id,
      content,
      model,
      seasons,
      colors,
      sizes,
      userid
          
    ) VALUES (
      :dress,
      :file,
      :filename,
      :product_id,
      :content,
      :model,
      :seasons,
      :colors,
      :sizes, 
      :userid
    )
  '
    );
  }

  //  ici on créer la fonction pour tout aller chercher

  public function fetchAll($userId)
  {
    //  on se réfère à l'instruction préparée et on l'éxécute
    $this->statementReadOne->bindValue(':userid', $userId);
    $this->statementReadAll->execute([$userId]);
    return $this->statementReadAll->fetchAll();
  }
  // fonction pour aller chercher juste l'id
  public function fetchOne($id)
  {
    $this->statementReadOne->bindValue(':userid', $id);
    $this->statementReadOne->execute([$id]);
    return $this->statementReadOne->fetch();
  }
  // fonction pour supprimer juste un article avec l'id
  public function deleteOne(int $id)
  {
    $this->statementDeleteOne->bindValue(':userid', $id);
    return $this->statementDeleteOne->execute([$id]);
  }
  // fonction pour créer juste un article avec l'id et on envoi les infos dans la bdd
  public function createOne($clothes)
  {
    $this->statementCreateOne->bindValue(':dress', $clothes['dress']);
    $this->statementCreateOne->bindValue(':file', $clothes['file']);
    $this->statementCreateOne->bindValue(':filename', $clothes['filename']);
    $this->statementCreateOne->bindValue(':product_id', $clothes['product_id']);
    $this->statementCreateOne->bindValue(':content', $clothes['content']);
    $this->statementCreateOne->bindValue(':model', $clothes['model']);
    $this->statementCreateOne->bindValue(':seasons', $clothes['seasons']);
    $this->statementCreateOne->bindValue(':colors', $clothes['colors']);
    $this->statementCreateOne->bindValue(':sizes', $clothes['sizes']);
    $this->statementCreateOne->bindValue(':userid', $clothes['userid']);
    $this->statementCreateOne->execute();
    return $this->fetchOne($this->pdo->lastInsertId());
  }
  // fonction pour aller chercher juste un article avec l'id
  public function updateOne($clothes)
  {
    $this->statementUpdateOne->bindValue(':dress', $clothes['dress']);
    $this->statementUpdateOne->bindValue(':file', $clothes['file']);
    $this->statementUpdateOne->bindValue(':filename', $clothes['filename']);
    $this->statementUpdateOne->bindValue(':product_id', $clothes['product_id']);
    $this->statementUpdateOne->bindValue(':content', $clothes['content']);
    $this->statementUpdateOne->bindValue(':model', $clothes['model']);
    $this->statementUpdateOne->bindValue(':seasons', $clothes['seasons']);
    $this->statementUpdateOne->bindValue(':colors', $clothes['colors']);
    $this->statementUpdateOne->bindValue(':sizes', $clothes['sizes']);
    $this->statementUpdateOne->bindValue(':id', $clothes['id']);
    $this->statementUpdateOne->bindValue(':userid', $clothes['userid']);
    $this->statementUpdateOne->execute();
    return $clothes;
  }
}
return new clothesDB($pdo);
