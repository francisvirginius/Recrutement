<?php
require_once '../database/pdo.php';


$email = $_POST['email'];
$password = $_POST['password'];

$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$statement->bindValue(':email',$email);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
if($user === false){
    $message1 =  'une erreur de connection !';
}else{
    if(password_verify($password,$user['password'])){
        session_start();
        $_SESSION['email'] = $email ; 
        
        foreach($pdo->query("SELECT confirmer FROM users WHERE email IN ('{$email}');") as $confirmer){
        $confirmerOrnot = $confirmer['confirmer']  ;

        if($confirmerOrnot === 'non'){
          $message1 = 'Votre compte doit être validé par notre équipe ' ;
        }else{
          foreach($pdo->query("SELECT admin , consultant, role FROM users WHERE email IN ('{$email}');") as $info){
          $_SESSION['consultant'] = $info['consultant']  ; 
          $_SESSION['admin'] = $info['admin']  ;
          $_SESSION['role'] = $info['role'] ;
        } ;

        header('Location:../index.php');    
        }
      
        }
        
    }else{
        $message1 = 'une erreur de connection !';
    }
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./index.css">
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
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="../connection/connecter.php" >Connexion</a>
      </div>
    </div>
  </header>
</div>
<div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 text-center">
                <h1><?php echo $message1 ?></h1>
            </div>
            <div class="modal-footer flex-nowrap p-0 text-center">
                <button class="btn btn-lg btn-secondary fs-5 text-decoration-none col-6 m-0 rounded-0 "><a href="./connecter.php" class='return'>Réessayer de me connecter</a></button>
                <button class="btn btn-lg btn-secondary fs-5 text-decoration-none col-6 m-0 rounded-0 border-right"><a href="../index.php" class='return'>Retourner a l'accueil</a></button>
            </div>
        </div>
      
  </body>
</html>
