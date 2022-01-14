<?PHP
var_dump($_POST) ;
require_once '../../database/pdo.php' ;
$email = $_POST['email'] ; 

if(isset($_POST['approve'])){
    $toApprove = 'approve';
}else{
    $toApprove = 'Not_approve';
}

if($toApprove === 'approve'){
    $statement = $pdo->prepare("UPDATE users SET confirmer = 'oui' WHERE email = '{$email}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible d\'approuver l\'utilisateur ';
    }
}

if($toApprove === 'Not_approve'){
    $statement = $pdo->prepare("DELETE FROM users WHERE poste = '{$email}' ");
    if ($statement->execute()) {
        return header('Location:./profilConsultant.php'); 
    } else {
        echo  'Impossible de sipprimer l\' utilisateur' ;
    }


}
?>