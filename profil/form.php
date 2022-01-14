<?php
require_once '../database/pdo.php';
var_dump($_FILES) ;
$nameCv = $_FILES['cv']['name'] ;
session_start();
// last name First Name
$nom = $_POST['nom'] ;
$prenom = $_POST['prenom'];
$empty = Null ;

if($nom == $empty || $prenom == $empty){
    $message1 = 'vous devez entre un nom et prenom ' ;
    
}else{
    $statement = $pdo->prepare("UPDATE users SET nom = :nom, prenom = :prenom Where email = '{$_SESSION['email']}' ;");
    $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
    $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR); 
    if ($statement->execute()) {
        $message1 = 'Vous avez modifier votre nom et prenom ! ';
    } else {
        $message1 ='Impossible de créer l\'utilisateur';
    }
}

// cv 
if (isset($_FILES["cv"])){
    if($_FILES['cv']['error'] !== UPLOAD_ERR_OK){
        $message2 = 'Une erreur est survenue veuillez réessayer !' ;
        }
    if($_FILES['cv']['size'] > 1048576){
        $message2 = 'Le cv est trop volumineux ';
        }

    if($_FILES['cv']['type'] === 'application/pdf'){
        $statement = $pdo->prepare("UPDATE users SET cv = :nom Where email = '{$_SESSION['email']}' ;");
        $statement->bindValue(':nom', $nameCv, PDO::PARAM_STR);
        if ($statement->execute()) {
            $message2 = 'Vous avez modifier votre PDF ! ';
        } else {
            $message2 ='Impossible d\'enregistrer votre cv ';
        }
        $tmp_name = $_FILES['cv']['tmp_name'] ;
        $name = $_FILES['cv']['name'] ;
            move_uploaded_file($tmp_name ,'./cv/' .$name);
       
        }else{
            $message2 = 'vous devez mettre uniquement un cv au format PDF';
        }
    
    
}else{
    $message2 = 'Aucun PDF détecter' ;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Profil</title>
    <link href="./profil.css" rel="stylesheet" type="text/css" />
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
              <a class="btn btn-sm btn-outline-secondary" href="../connection/connecter.php">Déconnexion</a>
            </div>
          </div>
        </header>
                
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 text-center">
                <h1><?php echo $message1 ?></h1>
            </div>
            <div class="modal-body p-4 text-center">
                <h2><?php if(isset($message2)){echo $message2 ;}?></h2>
            </div>
            <div class="modal-footer flex-nowrap p-0 text-center">
                <button class="btn btn-lg btn-secondary fs-5 text-decoration-none col-6 m-0 rounded-0 "><a href="./profil.php" class='return'>Retourner sur mon Profil</a> </button>
                <button class="btn btn-lg btn-secondary fs-5 text-decoration-none col-6 m-0 rounded-0 border-right"><a href="../index.php" class='return'>Retourner a l'accueil</a></button>
            </div>
        </div>
      
      </div>