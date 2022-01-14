<?php
session_start();
if(isset($_SESSION['email'])){
  session_destroy();
  header('Location:../index.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="./connecter.css" rel="stylesheet" type="text/css" />
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
              <a class="btn btn-sm btn-outline-secondary" href="./connecter.php">Sign up</a>
            </div>
          </div>
        </header>
      
      </div>
      <div class="form">
    <main class="form-signin text-center">
        <form method="POST" action="./form.php">
          <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>
      
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
      
          <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
          <div id="creeCompte"><a href="../creeCompte/CreeUnCompte.php">Je n'ai pas de compte !</a>
          </div>
          <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
      </main>
      
      </div>
  </body>
 
</html>