<?php
if(!isset($_SESSION)){
    session_start();
}
if ($userConnexion === 0){
    $userConnexion=1;
}else {
    $userConnexion++;
}
echo "<br> passage dans userConnexion= ".$userConnexion;
require_once("modeles/modele.inc.php");

// vérifie si le post du bouton submit existe et contrôle si le mail et le mot de passe n'est pas vide sinon ça affiche la page de connexion
if (isset($_POST['login-btn'])) {
    if (!empty($_POST['mail']) AND !empty($_POST['pwd'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $pwd = $_POST ['pwd'];

        $user = Connexion($email);
        
        if (count($user) === 1 AND password_verify($pwd, $user[0]['pwd'])) {
            $_SESSION['nom'] = $user[0]['nom_user'];
            $_SESSION['prenom'] = $user[0]['prenom_user'];
            $_SESSION['mail'] = $user[0]['email'];
            $_SESSION['roles'] = $user[0]['roles'];
            
            // Contrôle quel est le type de profil pour afficher les pages d'accueil correspondantes
            if ($_SESSION['roles'] === 'ROLE_SUPER_ADMIN') {
                require_once("controllers/controlUsers.php");
            } elseif ($_SESSION['roles'] === "ROLE_ADMIN" OR $_SESSION['roles'] === "ROLE_CUSTOMER") {
                require_once("controllers/controlTickets.php");
            }
            
        } else {
            $loginError = "Email ou mot de passe incorrect...";
        }
    } else {
        $loginError = "Veuillez compléter tous les champs...";
    }
}

require_once("Vue/view_connexion.php");
?>