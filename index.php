<?php
session_start();

if (!isset($_SESSION['email'])) {
    require_once("controllers/controlConnexion.php");

} else {

    if ($_SESSION['roles'] === "admin") {
        require_once("controllers/controlUsers.php");
        require_once("vue/view_header.php");
    } elseif ($_SESSION['roles'] === "moderator" ) {
        require_once("controllers/control_crudTicket.php");
    }elseif ($_SESSION['roles'] === "user" OR $_SESSION['roles'] === "customer") {
        require_once("controllers/control_crudTicket.php");
    }
}
?>