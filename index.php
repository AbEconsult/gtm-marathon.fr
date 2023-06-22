<?php
if (!isset($_SESSION)) {
    echo "<br> (00) je test si la session est toujours active dans - login - et passe pour la 1ère fois ";
    echo "<br> (00.a) je passe dans login - pour la 1ère fois ";

    session_start();
  }


if (!isset($_SESSION['email'])) {
    echo "<br> (01) je test si la session est toujours non active dans - login - et passe pour la 1ère fois le test de l'email";
    echo "<br> (01  a) je pars dans - controlconnexion - pour la 1ère fois après le test de l'email";
    require_once("controllers/controlConnexion.php");
} else {
    if ($_SESSION['roles'] === "admin") {
        echo "<br> (02) je test si la session 'admin' est toujours active dans - login - et passe pour la 1ère fois ";
        require_once("controllers/controlUsers.php");
        echo "<br> (03) je suis passé pour la 1ère fois dans controlUsers";
        // require_once("vue/view_header.php");
    } elseif ($_SESSION['roles'] === "moderator" ) {

        require_once("controllers/controlUsers.php");
    }elseif ($_SESSION['roles'] === "user" OR $_SESSION['roles'] === "customer") {

        require_once("controllers/controlUsers.php");
    }
}
?>