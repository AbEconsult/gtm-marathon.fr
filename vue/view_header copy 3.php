<?php
if (!isset($_SESSION)) {
    session_start();
}
// echo "<br> ********5 je suis dans view_header et la valeur de session roles =" . $_SESSION['roles'];
// echo "<br> ********5.a je suis dans view_header et la valeur de session email =" . $_SESSION['email'];
ob_start();
// $menu="";
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <title>GTM - Welcome!</title>

    <style>

    </style>

    <!--Import Google Icon Font-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="stylesheet" href="/public/css/materialize.min.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/app.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />

    <!--Import JQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Materialize -->
    <script src="public/js/materialize.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Signature Pad -->
    <script src="public/js/signature-pad.js"></script>
    <!-- Jquery Mask -->
    <script src="public/js/jquery.mask.min.js"></script>
    <!-- App -->
    <script type="text/javascript" src="public/js/app.js"></script>

</head>

<style type="text/css">
    .row,
    .input-field {
        margin-bottom: 5px;
    }

    .checkbox-horizontal label {
        margin-right: 20px;

    }

    nav
    {
    background-color: red !important;
    }


    @media print and (min-resolution: 50dpi) {
        body {

            width: 100%
        }

        nav {
            display: none;
        }

        col s12 {
            width: 50%
        }
    }

    @media only screen and (min-width: 601px) {
        .container {
            width: 98%;
        }
    }
</style>
<nav classe="navbar navbar-expand-lg">

    <div classe="nav-wrapper">
    <div class="container">
        <div class="row">
            <? //echo "<br> ********5.b je suis dans view_header et la div container la valeur de session email =" . $_SESSION['email']; ?>
            <a href="#" class="brand-logo s2 push-s5" id="compagny">GTM</a>
            <!-- <? //echo "<br> ********10 je ne passe dans le test view_header pour la 1ère fois "; ?> -->
            <?php if ($_SESSION['roles'] === "admin") { ?>
                <!-- <? //echo "<br> ********10 je passe dans view_header pour la 1ère fois et tUsers =" . $tUsers[0]; -->
                ?>
                <div class="right hide-on-med-and-down s2-pull-s3">
                    <span class="m-2"> -->
                    <!-- <i class="fa-solid fa-user mt-2"></i> -->
                    <span class=""><? $_SESSION['email'] ?></span>


                    <span class="navbar-nav s2-pull-s3">
                        <a class="right hide-on-med-and-down orange" href='modeles/deconnexion.php'>deconnexion</a>
                        <i class="material-icons right orange"> exit_to_app</i>
                    </span>
                    <!-- </span> -->
                </div>
                <div class="navbar-nav s6-push-s8">
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a></li>
                        <li><a class="right hide-on-med-and-down <?php active('List_Users'); ?>" aria-current="page" href="vue/view_listUsers.php">Users</a></li>
                        <li><a class="right hide-on-med-and-down <?php active('listModerators'); ?>" aria-current="page" href="vue/Moderators/moderateurs.php">Moderateurs</a></li>
                        <li><a class="right hide-on-med-and-down <?php active('listCustomer'); ?>" href="vue/Customers/clients.php">Client</a></li>
                        <li><a class="right hide-on-med-and-down <?php active('liste_drivers'); ?>" href="vue/Drivers/conducteurs.php">Conducteurs</a></li>
                        <li>
                            <a class="dropdown-trigger" href="/vue/Parametres/parametres-mode_paiements.php" data-target="dropdown1">Paramètres<i class="material-icons right">arrow_drop_down</i></a>
                            <ul id="dropdown1" class="dropdown-content" tabindex="0">
                                <li tabindex="0">
                                    <a href="/vue/Parametres/parametres-mode_paiements.php">Mode de paiment</a>
                                </li>
                                <li tabindex="0">
                                    <a href="/vue/Parametres/parametres-type_livraison.php">Types de livraison</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="right hide-on-med-and-down <?php active('missions'); ?>" href="vue/Missions/missions">Missions</a></li>
                    </ul>
                    <ul class="sidenav" id="mobile-demo">
                        <li><a href="accueil">Accueil</a></li>
                        <li><a href="vue/Moderators/moderateurs.php">Moderateurs</a></li>
                        <li><a href="vue/Customers/clients.php">Client</a></li>
                        <li><a href="vue/Drivers/conducteurs.php">Conducteurs</a></li>
                        <li><a href="vue/Missions/missions">Missions</a></li>
                    </ul>
                    <!-- <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var elems = document.querySelectorAll('.sidenav');
                            var instances = M.Sidenav.init(elems, options);
                        });

                        // Or with jQuery

                        $(document).ready(function() {
                            $('.sidenav').sidenav();
                        });
                    </script> -->
                </div>
            <?php } ?>
            <?php if ($_SESSION['roles'] === "moderator") { ?>
                <div class="navbar-nav s6-pull-s8">
                    <a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a>
                    <a class="right hide-on-med-and-down <?php active('listCustomer'); ?>" href="vue/Customers/clients.php">Client</a>
                    <a class="right hide-on-med-and-down <?php active('missions'); ?>" href="vue/Missions/missions">Missions</a>
                </div>
            <?php } elseif ($_SESSION['roles'] === "user" or $_SESSION['roles'] === "customer") { ?>
                <div class="navbar-nav s6-pull-s8">
                    <a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a>
                    <a class="right hide-on-med-and-down <?php active('missions'); ?>" href="vue/Missions/missions">Missions</a>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
</nav>

<?

$menu = ob_get_clean();

// require_once('vue/view_header.php');
require_once('vue/modele.php');
