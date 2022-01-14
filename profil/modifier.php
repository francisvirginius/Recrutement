<?php
session_start();

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
      
      </div>
      

      <main class="container">
        <form method="POST" action="./form.php" enctype="multipart/form-data">

            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                 <h1 class="h3 mb-3 fw-normal text-center fs-1">Modifier votre Profil</h1>


                    <div class="name">
                    Nom : <input type="text" name=" nom">
                    <br>
                    Prenom : <input type="text" name="prenom">
                    </div>
                    <hr>
                    <div>
                    <P class="label fs-4"><b>Address mail:</b></P>
                    <label class="label fs-4" for=""><?php echo $_SESSION['email'] ?></label>
                    </div>
                    <hr>
                    
                        <input type="file" name="cv">
                
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Envoyer</button>
                </div>
        </form>
    </main>
      
  </body>
</html>