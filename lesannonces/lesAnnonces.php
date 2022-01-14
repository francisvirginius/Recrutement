<?php
require_once '../database/pdo.php';
session_start();
     
      ?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Les annonces</title>
<link rel="stylesheet" href="./annonces.css">
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
        <a id ="Btnconnexion" class="btn btn-sm btn-outline-secondary" href="../connection/connecter.php" >Déconnexion</a>
      </div>
    </div>
  </header>

  <?php
  /** function which returns to apply or see the advertisements*/
  function postuler(){
    if(isset($_SESSION['role'])){
      if($_SESSION['role'] === 'recruteurs'){
        return  'voir les annonces';
      }else{
       return  'Postuler';
      }
    }else{
      return 'Postuler';
    }

  }
  foreach($pdo->query("SELECT poste,lieuDeTravail,description,approuver FROM annonces") as $annonces){
    $dom = new DOMDocument('1.0', 'utf-8');
    $poste = $annonces['poste'] ;
    $lieuDeTravail = $annonces['lieuDeTravail'] ;
    $description = $annonces['description'] ;
    $approuver = $annonces['approuver'] ;

    if($approuver === 'oui'){
      /** title of announcement  */
$div = $dom->createElement('div');
$divattribute = $dom->createAttribute('class'); 
$divattribute->value = 'row row-cols-2 row-cols-md-1 mb-3 text-center';
$div->appendChild($divattribute);
$dom->appendChild($div);
    $divCard = $dom->createElement('div');
    $div->appendChild($divCard);
        $form = $dom->createElement('form');
        $divCard->appendChild($form);
        $formAttribute = $dom->createAttribute('method'); 
        $formAttribute->value = 'POST';
        $form->appendChild($formAttribute);
        $formAttribute2 = $dom->createAttribute('action'); 
        $formAttribute2->value = './pagedesannonces.php';
        $form->appendChild($formAttribute2);
            $divShadow = $dom->createElement('div');
            $form->appendChild($divShadow);
            $divShadowAttribute = $dom->createAttribute('class'); 
            $divShadowAttribute->value = 'card mb-4 rounded-3 shadow-sm';
            $divShadow->appendChild($divShadowAttribute);
                    $divH4 = $dom->createElement('div');
                    $divShadow->appendChild($divH4);
                    $divH4Attribute = $dom->createAttribute('class'); 
                    $divH4Attribute->value = 'card-header py-3';
                        $h4 = $dom->createElement('h4',$poste);
                        $divH4->appendChild($h4);
                        $h4Attribute = $dom->createAttribute('class');
                        $h4Attribute->value = 'my-0 fw-normal';
                        $h4->appendChild($h4Attribute);
                    $divCardBody = $dom->createElement('div');
                    $divShadow->appendChild($divCardBody);
                    $divCardBodyAttribute = $dom->createAttribute('class'); 
                    $divCardBodyAttribute->value = 'card-body';
                    $divCardBody->appendChild($divCardBodyAttribute);
                        $h1 = $dom->createElement('h1',$lieuDeTravail);
                        $divCardBody->appendChild($h1);
                        $h1Attribute = $dom->createAttribute('class'); 
                        $h1Attribute->value = 'fw-light';
                        $h1->appendChild($h1Attribute);
                    $p = $dom->createElement('p',$description);
                    $divShadow->appendChild($p);
                    $input = $dom->createElement('input');
                    $divShadow->appendChild($input);
                    $inputAttribute = $dom->createAttribute('name'); 
                    $inputAttribute->value = 'poste';
                    $input->appendChild($inputAttribute);
                    $inputAttribute2 = $dom->createAttribute('value'); 
                    $inputAttribute2->value = $poste;
                    $input->appendChild($inputAttribute2);
                    $inputAttribute3 = $dom->createAttribute('hidden');
                    $input->appendChild($inputAttribute3);
                    $button = $dom->createElement('button',Postuler());
                    $divShadow->appendChild($button);
                    $buttonyAttribute = $dom->createAttribute('class'); 
                    $buttonyAttribute->value = 'w-100 btn btn-lg btn-outline-primary';
                    $buttonAttribute2 =$dom->createAttribute('type');
                    $buttonAttribute2->value = 'submit';
                    $button->appendChild($buttonAttribute2);
                    $button->appendChild($buttonyAttribute);
    $dom->appendChild($divCard);

/** send to dom  */
echo $dom->saveXML();
}
      }

  ?>
</div>

    
  </body>
</html>