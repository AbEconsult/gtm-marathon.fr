<?php
if (!isset($_SESSION)) {
    // echo "<br> (02 ) je test si la session est toujours active dans - controllers/controlConnexion - pour la 1ère fois ";
    session_start();
}
// echo "<br> (02 a) la session est toujours active dans - controllers/controlConnexion";
// echo "<br> (02 b) je pars dans - modeles/modele.inc pour la connexion à la base de données";
require_once("modeles/modele.inc.php");
// echo "<br> (03 ) je reviens dans - controllers/controlConnexion - pour la 2eme fois, après avoir chargé la fonction connexion() de modele.inc et test le login-btn";
require_once("vue/view_connexion.php");


if (isset($_POST['login-btn'])) {
    if (!empty($_POST['email']) and !empty($_POST['pwd'])) {
        $email = htmlspecialchars($_POST['email']);
        // echo "<br> 04 ) je vérifie user depuis - controllers/controlConnexion - pour la 1ère fois - la valeur du mdp est " . $_POST['pwd'] . " et le mail est " . $_POST['email'];
        $mdp = $_POST['pwd'];
        // echo "<br> 9) je lance connectUser(modele.inc.users) depuis  - controllers/controlConnexion - pour la 1ere fois ";

        $tUsers = getConnexion($email);

        if (count($tUsers) === 1 and password_verify($mdp, $tUsers[0]['pwd'])) {
            // echo "<br> 05 ) je vérifie user dans - controllers/controlConnexion - pour la 2ème fois ";
            // $_SESSION['firstname'] = $tUsers[0]['user_firstname'];
            // $_SESSION['lastname'] = $tUsers[0]['user_lastname'];
            $_SESSION['email'] = $tUsers[0]['email'];
            $_SESSION['pwd'] = $tUsers[0]['pwd'];
            $_SESSION['roles'] = $tUsers[0]['roles'];
            // echo "<br> 05.a) Email " . $_SESSION['email'] . " ou mot de passe correct... et la valeur de roles est  = " . $_SESSION['roles'];
            if ($_SESSION['roles'] === "admin") {
                // echo "<br> 05.b) je passe le test de la vérification de roles dans controlConnexion et que la valeur est égale à " . $tUsers[0]['roles'];
                require_once("controllers/controlUsers.php");
                // require_once("Moderators/moderateurs.php");
            } elseif ($_SESSION['roles'] === "moderator" or $_SESSION['roles'] === "driver") {
                // echo "<br> 05.c) je passe le test de la vérification de roles  = moderator ou driver dans controlConnexion et la valeur est égale à " . $_SESSION['roles'];
                require_once("controllers/controlUsers.php");
            }
        } else {
            $loginError = "Email ou mot de passe incorrect...";
            echo "<br> 05.a.1) " . $loginError . " ...";
?>
            <script>
                alert(<?php $loginError ?>);
            </script>
        <?php
        }
    } else {
        $loginError = "Veuillez compléter tous les champs...";
        ?><script>
            alert(<?php echo "champ vide, " . $loginError ?>);
        </script><?php
    }
}
            // echo "<br> (5) je vais dans - vue/view_Connexion - pour la 1ere fois, après contolConnexion et test le login-btn";        
                    ?>