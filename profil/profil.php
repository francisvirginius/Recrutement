<?php 
session_start();
 if(!isset($_SESSION['email'])){
  return header('Location:../connection/connecter.php'); 
    }
    if($_SESSION['admin'] == "1"){
      return header('Location:../profil/admin/profilAdmin.php'); 
    }
    if($_SESSION['consultant'] == "oui"){
      return header('Location:../profil/consultant/profilConsultant.php');
    }
    if($_SESSION['role'] === "recruteurs"){
      return header('Location:../profil/recruteur/profilRecruteur.php');
    }
    require_once '../database/pdo.php'
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      
      </div>
      

      <main class="container">
      
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <h1 class="h3 mb-3 fw-normal text-center fs-1">Votre Profil</h1>


            <div class="name">
                <p class="label fs-4" ><b>Nom et Prenom :</b></p>
                <label class="label fs-4" for=""><?php
                 foreach($pdo->query("SELECT nom, prenom FROM users where email IN ('{$_SESSION['email']}')") as $user){
                  if(isset($user['nom'])){
                      echo $user['nom'].' '.$user['prenom'] ;
                  }else{
                    echo 'Pour ajouter votre nom prénom appuyer sur  modifier                    ';
                  }
                  
                } ;
                ?></label>
            </div>
            <hr>
            <div>
              <P class="label fs-4"><b>Address mail:</b></P>
              <label class="label fs-4" for=""><?php echo $_SESSION['email'] ?></label>
            </div>
            <hr>
            <div>
              <p class="label fs-4">CV:</p>
              <p>
              <?php 
                 foreach($pdo->query("SELECT cv FROM users where email IN ('{$_SESSION['email']}')") as $cvUsers){
                  $cv = $cvUsers['cv'] ;
                if(isset($cv)){
                    echo $cv ;
                }else{
                  echo 'Pour ajouter un CV veuillez appuyer sur Modifiiez';
                }
              }
              ?>
              </p>
            </div>
        </div>
        </main>
        <div class="text-center">
            <button class="btn btn-dark"><a id="modify" href="./modifier.php" >Modifier</a></button>
        </div>
    
    
      
  </body>
</html>