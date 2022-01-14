<?php
require_once '../../database/pdo.php';

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Page consultant</title>
    <link rel="stylesheet" href="./profil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
</div>
<div>
  <button class="btn btn-primary"><a id="btn"href="/profil/recruteur/profilRecruteur.php">Acceder a mon profil de recruteur</a></button>
</div>
<div class="row g-5">



<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" id="listgroup">
    <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold"><b>Annonce à approuver</b></span>
    </a>
    <div class="list-group list-group-flush border-bottom scrollarea">
      <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">Titre des annonces </strong>
        </div>
        <div class="col-10 mb-1 small">La description des annonces !</div>
        <div>
          <button class="btn btn-danger">Pas approuver</button>
          <button class="btn btn-success">Approuver</button>
        </div>
      </a>
<!--    add announcements -->
<?PHP
foreach($pdo->query('SELECT poste,lieuDeTravail,description,approuver FROM annonces') as $annonces){
  $dom = new DOMDocument('1.0', 'utf-8');
  $poste = $annonces['poste'] ;
  $lieuDeTravail = $annonces['lieuDeTravail'] ;
  $description = $annonces['description'] ;
  $approuver = $annonces['approuver'] ;
  

  if($approuver === 'non'){
  $divparent = $dom->createElement('div');
  /** Title announcement */
        $h1 = $dom->createElement('h1', "$poste");
        $divparent->appendChild($h1);
  /** description  */
        $divdescription = $dom->createElement('div');
        $divparent->appendChild($divdescription);
            $pDescrip = $dom->createElement('p',"$description");
            $divdescription->appendChild($pDescrip);
  /** creation of the form to add or delete the advertisement (hidden) */
        $form = $dom->createElement('form');
        $divparent->appendChild($form);
        $formMethod = $dom->createAttribute('method');
        $formMethod->value = 'POST';
        $form->appendChild($formMethod);
        $formAction = $dom->createAttribute('action');
        $formAction->value = './approveOrNot.php';
        $form->appendChild($formAction);
  /**to retrieve the title of the announcement */
        $label = $dom->createElement('input');
        $divparent->appendChild($label);
        $nameLabel = $dom->createAttribute('name');
        $nameLabel->value = "poste";
        $label->appendChild($nameLabel);
        $typeLabel = $dom->createAttribute('type');
        $typeLabel->value = 'hidden';
        $label->appendChild($typeLabel);
        $valueLabel = $dom->createAttribute('value');
        $valueLabel->value = "$poste";
        $label->appendChild($valueLabel);
        if(isset($poste)){
          /** btn not approve */
        $Btn1 = $dom->createElement('button',"Pas approuver");
        $divparent->appendChild($Btn1);
        $classBtn = $dom->createAttribute('class');
        $typeBtn = $dom->createAttribute('type');
        $typeBtn->value = 'submit';
        $Btn1->appendChild($typeBtn);
        $classBtn->value = 'btn btn-danger';
        $Btn1->appendChild($classBtn);
        $name = $dom->createAttribute('name');
        $name->value = 'Not_approve';
        $Btn1->appendChild($name);
  /** btn approve */
        $Btn2 = $dom->createElement('button',"Approuver");
        $divparent->appendChild($Btn2);
        $classBtn2 = $dom->createAttribute('class');
        $typeBtn2 = $dom->createAttribute('type');
        $typeBtn2->value = 'submit';
        $Btn2->appendChild($typeBtn2);
        $classBtn2->value = 'btn btn-success';
        $Btn2->appendChild($classBtn2);
        $name2 = $dom->createAttribute('name');
        $name2->value = 'approve';
        $Btn2->appendChild($name2);

        }

  $dom->appendChild($divparent);
/** send to dom  */
echo $dom->saveXML();
}
}
?> 
    </div>
  </div>
<div class="col-md-5 col-lg-3 order-md-last">
  <!-- confirm new users --> 
  <h1>Nouveau utilisateur </h1>
  <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">Email des nouveau utilisateur</strong>
        </div>
        <div class="col-10 mb-1 small">Nom et Prnom !</div>
        <div>
          <button class="btn btn-danger">Supprimer</button>
          <button class="btn btn-success">Approuver</button>
        </div>
      </a>
  <?php
foreach($pdo->query('SELECT email ,nom ,prenom ,role, confirmer FROM users') as $users){
  $dom = new DOMDocument('1.0', 'utf-8');
  $email = $users['email'] ;
  $lastname = $users['nom'] ;
  $firstname = $users['prenom'] ;
  $role = $users['role'] ;
  $toConfirm = $users['confirmer'] ;

  if($toConfirm === 'non'){
      $divparentUsers = $dom->createElement('div');
      /** Title announcement */
            $h1email = $dom->createElement('h1', "$email");
            $divparentUsers->appendChild($h1email);
      /** first name and last name  */
            $divdescriptionName = $dom->createElement('div');
            $divparentUsers->appendChild($divdescriptionName);
                $pfirtname = $dom->createElement('p',"Prenom: $firstname");
                $divdescriptionName->appendChild($pfirtname);
                $plastname =  $dom->createElement('p',"Nom: $lastname");
                $divdescriptionName->appendChild($plastname);

      /** creation of the form to add or delete the advertisement (hidden) */
            $formUsers = $dom->createElement('form');
            $divparentUsers->appendChild($formUsers);
            $formMethodUsers = $dom->createAttribute('method');
            $formMethodUsers->value = 'POST';
            $formUsers->appendChild($formMethodUsers);
            $formActionUsers = $dom->createAttribute('action');
            $formActionUsers->value = './newUsers.php';
            $formUsers->appendChild($formActionUsers);
      /**to retrieve the title of the announcement */
                $labelUsers = $dom->createElement('input');
                $formUsers->appendChild($labelUsers);
                $nameLabelUsers = $dom->createAttribute('name');
                $nameLabelUsers->value = "email";
                $labelUsers->appendChild($nameLabelUsers);
                $typeLabelUsers = $dom->createAttribute('type');
                $typeLabelUsers->value = 'hidden';
                $labelUsers->appendChild($typeLabelUsers);
                $valueLabelUsers = $dom->createAttribute('value');
                $valueLabelUsers->value = "$email";
                $labelUsers->appendChild($valueLabelUsers);
            if(isset($email)){
                /** btn not approve */
                $Btn1Users = $dom->createElement('button',"Supprimer");
                $formUsers->appendChild($Btn1Users);
                $classBtnUsers = $dom->createAttribute('class');
                $typeBtnUsers = $dom->createAttribute('type');
                $typeBtnUsers->value = 'submit';
                $Btn1Users->appendChild($typeBtnUsers);
                $classBtnUsers->value = 'btn btn-danger';
                $Btn1Users->appendChild($classBtnUsers);
                $nameUser = $dom->createAttribute('name');
                $nameUser->value = 'Not_approve';
                $Btn1Users->appendChild($nameUser);
      /** btn approve */
                $Btn2Users = $dom->createElement('button',"Approuver");
                $formUsers->appendChild($Btn2Users);
                $classBtn2Users = $dom->createAttribute('class');
                $typeBtn2Users = $dom->createAttribute('type');
                $typeBtn2Users->value = 'submit';
                $Btn2Users->appendChild($typeBtn2Users);
                $classBtn2Users->value = 'btn btn-success';
                $Btn2Users->appendChild($classBtn2Users);
                $name2Users = $dom->createAttribute('name');
                $name2Users->value = 'approve';
                $Btn2Users->appendChild($name2Users);
    
            }
    
      $dom->appendChild($divparentUsers);
    /** send to dom  */
    echo $dom->saveXML();
    }

  }

  ?>
</div>


<div class="col-md-5 col-lg-4">
  <h1>Candidats</h1>
  <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">L'annonces qu'ils ont postulées </strong>
        </div>
        <div class="col-10 mb-1 small">Nom Prenom du candidats et son CV !</div>
        <div>
          <button class="btn btn-danger">Supprimer</button>
          <button class="btn btn-success">Approuver</button>
        </div>
      </a>
      <?php
      foreach($pdo->query('SELECT id, poste ,candidats ,confirmer FROM listecandidats') as $toConfirmCandidates ){
        $requestId  = $toConfirmCandidates['id'];
       $jobRequest = $toConfirmCandidates['poste'];
       $candidates = $toConfirmCandidates['candidats'];
       $confirmer = $toConfirmCandidates['confirmer'];


       if($confirmer === 'non'){
          $dom = new DOMDocument('1.0', 'utf-8');
          $divparentcandidats = $dom->createElement('div');
          /** Title announcement */
                $h1emailPoste = $dom->createElement('h1', "$jobRequest");
                $divparentcandidats->appendChild($h1emailPoste);
          /** first name and last name  */
                $divdescriptioncandidats = $dom->createElement('div');
                $divparentcandidats->appendChild($divdescriptioncandidats);
                    $pfirtnamecandidats = $dom->createElement('p',"Email: $candidates");
                    $divdescriptioncandidats->appendChild($pfirtnamecandidats);
          /** creation of the form to add or delete the advertisement (hidden) */
                $formcandidats = $dom->createElement('form');
                $divparentcandidats->appendChild($formcandidats);
                $formMethodcandidats = $dom->createAttribute('method');
                $formMethodcandidats->value = 'POST';
                $formcandidats->appendChild($formMethodcandidats);
                $formActioncandidats = $dom->createAttribute('action');
                $formActioncandidats->value = './approvecandidates.php';
                $formcandidats->appendChild($formActioncandidats);
          /**to retrieve the title of the announcement */
                    $labelcandidats = $dom->createElement('input');
                    $formcandidats->appendChild($labelcandidats);
                    $nameLabelcandidats = $dom->createAttribute('name');
                    $nameLabelcandidats->value = "id";
                    $labelcandidats->appendChild($nameLabelcandidats);
                    $typeLabelcandidats = $dom->createAttribute('type');
                    $typeLabelcandidats->value = 'hidden';
                    $labelcandidats->appendChild($typeLabelcandidats);
                    $valueLabelcandidats = $dom->createAttribute('value');
                    $valueLabelcandidats->value = "$requestId";
                    $labelcandidats->appendChild($valueLabelcandidats);
                if(isset($jobRequest)){
                    /** btn not approve */
                    $Btn1candidats = $dom->createElement('button',"Supprimer");
                    $formcandidats->appendChild($Btn1candidats);
                    $classBtn1candidats = $dom->createAttribute('class');
                    $classBtn1candidats->value = 'btn btn-danger';
                    $Btn1candidats->appendChild($classBtn1candidats);
                    $typeBtncandidats = $dom->createAttribute('type');
                    $typeBtncandidats->value = 'submit';
                    $Btn1candidats->appendChild($typeBtncandidats);
                    $namecandidats = $dom->createAttribute('name');
                    $namecandidats->value = 'Not_approve';
                    $Btn1candidats->appendChild($namecandidats);
          /** btn approve */
                    $Btn2candidats = $dom->createElement('button',"Approuver");
                    $formcandidats->appendChild($Btn2candidats);
                    $classBtn2candidats = $dom->createAttribute('class');
                    $typeBtn2candidats = $dom->createAttribute('type');
                    $typeBtn2candidats->value = 'submit';
                    $Btn2candidats->appendChild($typeBtn2candidats);
                    $classBtn2candidats->value = 'btn btn-success';
                    $Btn2candidats->appendChild($classBtn2candidats);
                    $name2candidats = $dom->createAttribute('name');
                    $name2candidats->value = 'approve';
                    $Btn2candidats->appendChild($name2candidats);
        
                }
        
          $dom->appendChild($divparentcandidats);
        /** send to dom  */
        echo $dom->saveXML();
        }
       }
      

        
      


      ?>
</div>
</div>

  </body>
</html>