<?php
require_once '../database/pdo.php';

$lieux = $_POST["lieux"];
$poste = $_POST["poste"];
$description = $_POST["description"];

$statement = $pdo->prepare('INSERT INTO annonces (poste, lieuDeTravail, description,approuver) VALUES (:poste, :lieuDeTravail, :description,:approuver)');
$statement->bindValue(':poste', $poste);
$statement->bindValue(':lieuDeTravail', $lieux);
$statement->bindValue(':description', $description);
$statement->bindValue(':approuver', 'non');
if ($statement->execute()) {
  /*  return header('Location:../index.php');      */
} else {
    $message = 'Impossible de créer l\'annonces';
}

$statement = $pdo->prepare("CREATE TABLE '$poste' (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,lesCandidats VARCHAR(50)) ");
if ($statement->execute()) {
  return header('Location:../index.php');      
} else {
   $message = 'Impossible de créer l\'annonces';
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
    <title>PublierAnonces</title>
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
<p><?php echo $message; ?></p>
</div>
  </body>
</html>