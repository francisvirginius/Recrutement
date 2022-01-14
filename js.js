let emailUser = document.getElementById('email').textContent;
let btnSign = document.getElementById('Btnconnexion');

 if(emailUser == ""){
    btnSign.innerHTML = "Connexion";
 }else{
    btnSign.innerHTML = "Déconnexion";
 }


