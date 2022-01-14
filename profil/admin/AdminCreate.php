<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Cree un consultant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./AdminCreate.css">
  </head>
  <body>
  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="/profil/profil.php">Profil</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/index.php">TRT Conseil</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="/connection/connecter.php" >Déconnexion</a>
      </div>
    </div>
  </header>
  <main class="form-signin text-center">
        <form method="POST" action="./formAdmin.php">
          <h1 class="h3 mb-3 fw-normal">Cree un Consultant ou supprimer un Utilesateur </h1>
      
          <div id="inputForUser" class="col-sm-6">
            <label class="form-label" for="firstName">Ecrivez le nom pour modifier son role</label>
            <input type="text" class="form-control" id="floatingInput"  name="nom">
          </div>
          <P class="fs-4">Sélectionné votre action </P>
          <div>
            <input type="radio" id="recruteurs" name="drone" value="createConsultant" checked>
            <label for="huey">Cree un Consultant</label>
          </div>
          <div>
            <input type="radio" id="candidats" name="drone" value="deleteConsultant">
            <label for="dewey">Supprimer un Consultant</label>
          </div>
          <div class="lastchoise">
            <input type="radio" id="candidats" name="drone" value="deleteUtilesateur">
            <label for="smith">Supprimer un Utilesateur</label>
          </div>
      
          <button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
      </main>

</div>
  </body>
</html>