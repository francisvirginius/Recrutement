<?php 
var_dump($_POST) ;
require_once '../../database/pdo.php' ;

$requestId = $_POST['id'] ; 

if(isset($_POST['approve'])){
    $toApprove = 'approve';
}else{
    $toApprove = 'Not_approve';
}

if($toApprove === 'approve'){
    $statement = $pdo->prepare("UPDATE listecandidats SET confirmer = 'oui' WHERE id = '{$requestId}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible d\'approuver la candidature' ;
    }
}

if($toApprove === 'Not_approve'){
    $statement = $pdo->prepare("DELETE FROM listecandidats WHERE poste = '{$requestId}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible de supprimer la candidature' ;
    }
}

require_once '../../database/annonce.php' ;

?>