<?php
require_once "../../database/pdo.php";

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="../../profil/profil.php">Profil</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/index.php">TRT Conseil</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="/connection/connecter.php" >Déconnexion</a>
      </div>
    </div>
  </header>
  <div class="text-center">
<a class="btn btn-outline-secondary " href="./AdminCreate.php" >Cree un Consultant/supprimer un consultant ou users </a>
  </div>
 <p class="fs-6 fst-italic" style="color:red">*vide = NULL </p>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom <p><small>(Nom d'entreprise)</small></p> </th>
      <th>Role</th>
      <th scope="col">Consultant</th>
    </tr>
  </thead>
  <tbody id="parent">
    <!-- creation of tables  -->
    <?php 
    foreach($pdo->query('SELECT nom,role,consultant FROM users') as $user){
      $dom = new DOMDocument('1.0', 'utf-8');
      $name = $user['nom'] ;
      $role = $user['role'] ;
      $consultant = $user['consultant'] ;
      // faire l'arborecence 

      $element1 = $dom->createElement('tr');
          $element2 = $dom->createElement('td',$name);
          $element1->appendChild($element2);
          $element3 = $dom->createElement('td', $role);
          $element1->appendChild($element3);
          $element4 = $dom->createElement('td', $consultant);
          $element1->appendChild($element4);

      $dom->appendChild($element1);

        echo $dom->saveXML();
    } ; 

    ?>
  </tbody>
</table>


  <p id="table" hidden><?php foreach($pdo->query('SELECT nom,role FROM users') as $user){
  echo $user['nom'].' '.$user['role'];
} ; ?></p>
</div>

  </body>
</html>