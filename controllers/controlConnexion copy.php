<?php
if (!isset($_SESSION)) {
    echo "<br> (3) je test si la session est toujours active dans - controllers/controlConnexion - pour la 1ère fois ";
    session_start();
}

require_once("modeles/modele.inc.php");
echo "<br> (5) je repasse dans - controllers/controlConnexion - pour la 2eme fois, après modele.inc";

// require_once("modeles/modele.inc.php");
// echo "<br> 3.a) j'ai lancé automatiquement la function connexion de modele.inc et lance view_connexion";

// echo "<br> je passe dans - controllers/controlConnexion - pour la 2ème fois ";
// $controlConexxion =" 7) controlConnexion - 2ème fois"; echo $controlConexxion;
// vérifie si le post du bouton submit existe et contrôle si le mail et le mot de passe n'est pas vide sinon ça affiche la page de connexion
echo "<br> 5.a) je reviens dans controlConnexion et vais tester 'login-btn', qui pour l'instant pas définit et vide";


// require_once("vue/view_accueil.php");

// echo $_POST['btn-connexion'];
// echo "Depuis ControlConexion bouton connexion  = ".$_POST['login-btn'];

if (isset($_POST['login-btn'])) {



    echo "<br> 8) je vérifie user depuis - controllers/controlConnexion - pour la 1ère fois - la valeur du mdp est " . $_POST['pwd'] . " et le mail est " . $_POST['email'];

if (!empty($_POST['email']) and !empty($_POST['pwd'] )) {
            // $id=0;
            $email = htmlspecialchars($_POST['email']);
            $nom = "";
            // $user_can = "";
            $mdp = $_POST['pwd'];
            echo "<br> 9) je lance connectUser(modele.inc.users) depuis  - controllers/controlConnexion - pour la 1ere fois ";
            require_once("modeles/modele.inc.php");
            $tUsers = getConnexion($email);
            // echo "<br> 11) je reviens dans contrConnexion après avoir lancé connectUser - depuis modeles/modele.inc.php";

            // echo "<br> 11.a) la valeur de count user " . count($tUsers[0]) . ", et du mdp = $mdp, et user (0) = " . password_verify($mdp, $tUsers[0]['pwd']);
            // echo " - 1 est éagle = true ";
        if (!empty($tUsers[0])){
            if (count($tUsers[0]) == 4 and password_verify($mdp, $tUsers[0]['pwd'])) {
                // if (count($user) == 8 ) {
                echo "<br> 11 aaa) je vérifie user dans - controllers/controlConnexion - pour la 2ème fois ";
                $_SESSION['username'] = $tUsers[0]['username'];
                $_SESSION['email'] = $tUsers[0]['email'];
                $_SESSION['pwd'] = $tUsers[0]['pwd'];
                $_SESSION['roles'] = $tUsers[0]['roles'];
                echo "<br> 11.b) Email ".$_SESSION['email']." ou mot de passe correct... et la valeur de roles est  = " . $_SESSION['roles'];
                $acces = true;
                // Contrôle quel est le type de profil pour afficher les pages d'accueil correspondantes
                if ($_SESSION['roles'] === "admin") {
                    echo "<br> 11.c) je passe le test de la vérification de roles = admin dans controlConnexion et la valeur est égale à " . $_SESSION['roles'];
                    // $action = 'list_Users';
                    // require_once("controllers/controlUsers.php");
                    // $contenu="";
                    $action = 'accueil';
                } elseif ($_SESSION['roles'] === "moderator" or $_SESSION['roles'] === "driver") {
                    echo "<br> 11.d) je passe le test de la vérification de roles  = hotline ou dev dans controlConnexion et la valeur est égale à " . $_SESSION['roles'];
                    $action = "listTicketsUser";
                    require_once("controllers/controlTickets.php");
                }
            }
            } else {
                $loginError = "Email ou mot de passe incorrect...";
                echo "<br> 11.b.1) " . $loginError . " ...";
                $acces=false;
                // echo "<br> 11.b.1) $loginError... et la valeur de roles est  = " . $_SESSION['roles'];
                $contenu = "";
                require_once "login.php";
                ?>
                <script>
                    alert(<?php $loginError ?>);
                </script><?php
            }  
                      }  else {
                        $loginError = "Veuillez compléter tous les champs...";
                        echo "<br> 11.b.2) $loginError... et la valeur de roles est  = " . $_SESSION['roles'];
                        $acces=false;
                            ?><script>
                alert(<?php $loginError ?>);
            </script><?php
                    }

                    // echo "<br> je suis passé sur user et l'erreur est =  $loginError - dans - controllers/controlConnexion - pour la 3ème fois - je pars dans view_connexion ";  
                }
            // }
                        ?>