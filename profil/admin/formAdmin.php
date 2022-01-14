<?php
require_once '../../database/pdo.php';

$nom = $_POST['nom'] ;

if($_POST['drone'] === 'createConsultant' ){
        $statement = $pdo->prepare("UPDATE users SET consultant = 'oui' WHERE nom = :nom");
    $statement->bindValue(':nom',$nom);
    if ($statement->execute()) {
        $message ='L\'utilisateur est bien devenu consultant';
    } else {
        $message = 'l\'utilisateur n\'exite pas ';
    }

}
if($_POST['drone'] === 'deleteConsultant'){
    $statement = $pdo->prepare("UPDATE users SET consultant = 'non' WHERE nom = :nom");
    $statement->bindValue(':nom',$nom);
    if ($statement->execute()) {
         $message ='L\'utilisateur n\'est plus consultant';
    } else {
        $message = 'l\'utilisateur n\'exite pas ';
    }
}
if($_POST['drone'] === 'deleteUtilesateur'){
    $statement = $pdo->prepare('DELETE FROM users WHERE nom = :nom');
    $statement->bindValue(':nom',$nom);
    if ($statement->execute()) {
        $message ='L\'utilisateur a ete supprimer ';
    } else {
        $message = 'l\'utilisateur n\'exite pas ';
    }
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="../profil/profil.php">Profil</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="../index.php">TRT Conseil</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="../connection/connecter.php" >Déconnexion</a>
      </div>
    </div>
  </header>

</div>
<div class="text-center">
          <h1><?php echo $message ?></h1>
          <div class="text-center ">
             <a class="btn btn-success" href="./profilAdmin.php">Retourner dans mon Profil</a>
          </div>
        </div>
  </body>
</html>