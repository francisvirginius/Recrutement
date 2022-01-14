<?php
var_dump($_POST) ;
require_once '../../database/pdo.php' ;

$poste = $_POST['poste'] ; 
if(isset($_POST['approve'])){
    $toApprove = 'approve';
}else{
    $toApprove = 'Not_approve';
}

   if($toApprove === 'approve'){

    $statement = $pdo->prepare("UPDATE annonces SET approuver = 'oui' WHERE poste = '{$poste}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible d\'approuver l\'annonce';
    }
} 
if($toApprove === 'Not_approve'){
    $statement = $pdo->prepare("DELETE FROM annonces WHERE poste = '{$poste}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible de supprimer l\' annonce' ;
    }
}
?>
