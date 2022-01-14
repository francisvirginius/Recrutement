<?php
require_once '../database/pdo.php';
session_start();
$poste = $_POST["poste"] ;

if(!isset($_SESSION['role'])){
    return header('Location:../connection/connecter.php'); 
}
if($_SESSION['role'] === 'candidats'){
$email = $_SESSION['email'] ;
$statement = $pdo->prepare("INSERT INTO listeCandidats (poste,Candidats,confirmer) VALUES (:poste,:Candidats,:confirmer)");
$statement->bindValue(':poste', $poste);
$statement->bindValue(':Candidats', $email);
$statement->bindValue(':confirmer', 'non');
if ($statement->execute()) {
  return header('Location:./lesAnnonces.php'); 
} else {
  exit('Impossible de postuler a l\'annonce');
}
}
$poste = $_POST['poste'];
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Les annonces</title>
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
<?php

foreach($pdo->query("SELECT poste,lieuDeTravail,description FROM annonces WHERE poste = '{$poste}'") as $annonces){
    $poste = $annonces['poste'] ;
    $lieuDeTravail = $annonces['lieuDeTravail'] ;
    $description = $annonces['description'] ;
}
?>
<div>
  <p class="fs-3 ">Votre annonce:</p>
  <h1 class="fs-1 text-center"><?php echo $poste ?></h1>
  <h2 class="fs-3 text-center"><?php echo $lieuDeTravail ?></h2>
  <p class="fs-5 text-center"><?php echo $description ?></p>
</div>
<div>
<p class="fs-3 ">les candidats:</p>
<?php 
    foreach($pdo->query("SELECT candidats, confirmer FROM listecandidats WHERE poste = '{$poste}'") as $announcement){
        $toConfirm = $announcement['confirmer'] ;
        if($toConfirm === 'oui'){
          $dom = new DOMDocument('1.0', 'utf-8');
          if(isset($announcement['candidats'])){
            $name = $announcement['candidats'] ;
          $p = $dom->createElement('p', "$name");
          $dom->appendChild($p);
          $pAttribute = $dom->createAttribute('class'); 
          $pAttribute->value = 'fs-3 text-center';
          $p->appendChild($pAttribute);

            echo $dom->saveXML();
          }else{
            $message =  'Aucun candidats a postuler a votre annonce ' ;
          }
      }
    } ; 

    ?>
    <p class="fs-3 text-center"><?php if(isset($message)){echo $message;} ?></p>
</div>
</div>
  </body>
</html>