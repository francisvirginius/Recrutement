<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cree un Compte</title>
    <link href="./CreeCompte.css" rel="stylesheet" type="text/css" />
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
              <a class="btn btn-sm btn-outline-secondary" href="../connection/connecter.php">Sign up</a>
            </div>
          </div>
        </header>
      
      </div>
    <main class="form-signin text-center">
        <form method="POST" action="./form.php">
          <h1 class="h3 mb-3 fw-normal">Cree un Compte</h1>

          <!-- firstname lastname --> 

          <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="firstName">First name</label>
                  <input class="form-control" type="text" class="form-control" id="firstName" name="firstName">
                  
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lastName">Last name</label>
                  <input class="form-control" type="text" class="form-control" id="lastName" name="lastName">

                </div>
          </div>

          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
          </div>
        
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <P class="question">Sélectionné  votre statut </P>
          <div>
            <input type="radio" id="recruteurs" name="drone" value="recruteurs" checked>
            <label for="huey">recruteurs</label>
          </div>
          <div>
            <input type="radio" id="candidats" name="drone" value="candidats">
            <label for="dewey">candidats</label>
          </div>
      
          <button class="w-100 btn btn-lg btn-primary" type="submit">Cree un Compte</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
      </main>
      
      
  </body>
</html>