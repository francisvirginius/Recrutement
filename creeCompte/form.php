<?php
require_once '../database/pdo.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$drone = $_POST['drone'];
$confirmer = 'non';

$statement = $pdo->prepare('INSERT INTO users(email, role, password,nom ,prenom ,confirmer) VALUES (:email, :role, :password, :nom, :prenom, :confirmer)');
$statement->bindValue(':email', $email);
$statement->bindValue(':role', $drone);
$statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
$statement->bindValue(':nom', $lastName);
$statement->bindValue(':prenom', $firstName);
$statement->bindValue(':confirmer', $confirmer);

if ($statement->execute()) {
    $message ='L\'utilisateur a bien été créé, mais doit être vérifié par notre équipe ';
} else {
    $message = 'Impossible de créer l\'utilisateur';
}
 

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Cree un Compte</title>
    <link href="./CreeCompte.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./index.css">
  </head>
  <body>
      <div class="text-center">
          <h1><?php echo $message ?></h1>
          <div class="text-center ">
             <a class="btn btn-success" href="../index.php">Retourner a l'accueil</a>
          </div>
        </div>
  </body>
  </html>