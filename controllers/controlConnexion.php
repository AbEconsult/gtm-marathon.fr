<?php
if(!isset($_SESSION)){
    echo "<br> je test si la session est toujours active dans - controllers/controlConnexion - pour la 1ère fois ";
    session_start();
}
$user="";
$mdp="";
$loginError="";

require_once("modeles/modele.inc.php");
// require_once("modeles/modele.inc.php");
echo "<br> 3.a) j'ai lancé automatiquement la function connexion de modele.inc et lance view_connexion";
// echo "<br> je passe dans - controllers/controlConnexion - pour la 2ème fois ";
// $controlConexxion =" 7) controlConnexion - 2ème fois"; echo $controlConexxion;
// vérifie si le post du bouton submit existe et contrôle si le mail et le mot de passe n'est pas vide sinon ça affiche la page de connexion
echo "<br> 4) je reviens dans controlConnexion et vais dans  view_connexion et retourne dans index";

require_once "login.html";

// echo $_POST['btn-connexion'];
// echo $_POST['login-btn'];

if (isset($_POST['login-btn'])) {



echo "<br> 8) je vérifie user depuis - controllers/controlConnexion - pour la 1ère fois - la valeur du mdp est ".$_POST['password']." et le mail est ".$_POST['email'];
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = $_POST ['password'];
echo "<br> 9) je lance connectUser(modele.inc) depuis  - controllers/controlConnexion - pour la 1ere fois ";
        $user = connectUser($email);
echo "<br> 11) je reviens dans contrConnexion après avoir lancé connectUser - depuis modeles/modele.inc.php";

echo "<br> 11.a) la valeur de count user ".count($user)." et du mdp = $mdp, et user (0) = ".password_verify($mdp, $user[0]['password']); echo " - 1 est éagle = true ";
        if (count($user) == 1 AND password_verify($mdp, $user[0]['password'])) {
            echo "<br> 11 aaa) je vérifie user dans - controllers/controlConnexion - pour la 2ème fois ";  
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];
            $_SESSION['roles'] = $user[0]['roles'];
echo "<br> 11.b) Email ou mot de passe correct... et la valeur de roles est  = ".$_SESSION['roles'];
            // Contrôle quel est le type de profil pour afficher les pages d'accueil correspondantes
            if ($_SESSION['roles'] === 1) {
echo "<br> 11.c) je passe le test de la vérification de roles = admin dans controlConnexion et la valeur est égale à ".$_SESSION['roles'];
                $action = 'list_Users';
                require_once("controllers/controlUsers.php");
            } elseif ($_SESSION['roles'] === 3 OR $_SESSION['roles'] === 4) {
echo "<br> 11.d) je passe le test de la vérification de roles  = hotline ou dev dans controlConnexion et la valeur est égale à ".$_SESSION['roles'];
                $action="listTicketsUser";
                require_once("controllers/controlTickets.php");
            }
            
        } else {
            $loginError = "Email ou mot de passe incorrect...";
            echo "<br> 11.b.1) $loginError... et la valeur de roles est  = ".$_SESSION['roles'];
            ?><script>alert(<?php $loginError ?>);</script><?php
        }
    } else {
        $loginError = "Veuillez compléter tous les champs...";
        echo "<br> 11.b.2) $loginError... et la valeur de roles est  = ".$_SESSION['roles'];
        ?><script>alert(<?php $loginError ?>);</script><?php
    }
    
    // echo "<br> je suis passé sur user et l'erreur est =  $loginError - dans - controllers/controlConnexion - pour la 3ème fois - je pars dans view_connexion ";  
}
?>