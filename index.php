<?php
require_once './database/pdo.php';

session_start();
// $checkEmail = $_SESSION['email'] ;
if(isset($_SESSION['role'])){
  $role = $_SESSION['role'] ;
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
<link rel="stylesheet" href="./index.css">
  </head>


<body> 
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="./profil/profil.php">Profil</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="./index.php">TRT Conseil</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
<!--check and display email -->
        <p id="email" class="fs-5"><?php if(isset($_SESSION['email'])){
           echo $_SESSION['email'] ;
        } ?></p>
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="./connection/connecter.php" >Connexion</a>
      </div>
    </div>
  </header>

</div>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">TRT Conseil est une agence de recrutement</h1>
      <p class="lead my-3"> spécialisée dans l’hôtellerie et la restauration, Fondée en 2014.</p>
    </div>
  </div>

  <!-- btn add a post -->
  <div class="text-center ">
  <!-- btn post an ad if the user is a recruiter -->
  <?php
  if(isset($role )){
  if($role === 'recruteurs'){
    $dom = new DOMDocument('1.0', 'utf-8');
    $div = $dom->createElement('div');
    $dom->appendChild($div);

    $btn = $dom->createElement('a', 'Publier une annonce');
    $bntAttribute = $dom->createAttribute('class');
    $bntAttribute->value = 'btn btn-dark';
    $bntAttribute2 =$dom->createAttribute('href');
    $bntAttribute2->value = './publierAnnonce/publierAnnoce.php';
    $btn->appendChild($bntAttribute2);
    $btn->appendChild($bntAttribute);
    $dom->appendChild($btn);

    echo $dom->saveXML();

  }
}
  ?>
  <a class="btn btn-dark"href="./lesannonces/lesAnnonces.php">Voir les annonce</a>
</div>
<!-- recruiters post  -->
<h1 class="text-center">Exemple des annonces</h1>
  <div class="row mb-2">
    <!-- 1 poste-->
    <div class="col-md-6">
    <h1 class="my-0 fw-normal fs-4 text-center">Nom du poste a pourvoir </h1>
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <div class="fs-3 text-center">lieu du poste </div>
          <p class="card-text mb-auto text-center fs-6">Descripion -> ici retrouver plus d'information sur l'annonce comme :  </p>
          <ul id="ul" class="text-center fs-6">
            <li>le profil requis </li>
            <li>le nombres d'heure </li>
            <li>des précisions sur le poste à pourvoir </li>
            <li>et bien plus...</li>
          </ul>
            <div class="text-center">
              <button class="btn btn-primary"> voir les candidats</button>
              <p><small>*vous pourez voir tous les candidats qui on postuler </small></p>
            </div>
        </div>
      </div>
    </div>
    <!-- creation of announcements for candidates to apply -->
    <div class="col-md-6">
    <h1 class="my-0 fw-normal fs-4 text-center">Nom du poste a pourvoir </h1>
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <div class="fs-3 text-center">lieu du poste </div>
          <p class="card-text mb-auto text-center fs-6">Descripion -> ici retrouver plus d'information sur l'annonce comme :  </p>
          <ul id="ul" class="text-center fs-6">
            <li>le profil requis </li>
            <li>le nombres d'heure </li>
            <li>des precision sur le poste a pourvoir  </li>
            <li>et bien plus...</li>
          </ul>
            <div class="text-center">
              <button class="btn btn-primary"> Postuler</button>
              <p><small>*Une fois que vous avez postulé nous examinerons et nous enverrons votre candidature  </small></p>
            </div>
        </div>
      </div>
    </div>


<!-- footer (agency info) -->
  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Notre agence de recrutement
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title">Pourquoi avoir créé un site ?</h2>

        <p>la société s’est agrandie au fil des ans et possède dorénavant plus de 12 centres dispersés aux
          quatre coins de la France .</p>
        <hr>
        <p>La crise du coronavirus ayant frappée de plein fouet ce secteur, la société souhaite progressivement
          mettre en place un outil permettant à un plus grand nombre de recruteurs et de candidats de trouver leur
          bonheur.</p>
        <p>TRT Conseil désire avoir un produit viable afin de tester si la demande est réellement présente.</p>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Remonter a l'Accueil</a>
      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">A propos de nous </h4>
          <p class="mb-0">Nous sommes TRT Conseil , nos agences  de recrutement sont dispersée sur toute la France. 
            cette agence est  spécialisé dans l’hôtellerie et la restauration.</p>
        </div>
        <div class="p-4">
          <h4 class="fst-italic">réseau sociaux</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main> 
<script src="./js.js"></script>
  </body>
</html>
