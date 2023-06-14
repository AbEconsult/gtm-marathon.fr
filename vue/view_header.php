<?php
if (!isset($_SESSION)) {
    session_start();
}

ob_start();
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <img class="logo" src="" alt="">

        <?php if (!isset($_SESSION['email'])) { ?>
            <? echo "variable session =" . $_SESSION['email'] ?>
            <style type="text/css">
                .row,

                .input-field {
                    margin-bottom: 5px;
                }

                .checkbox-horizontal label {
                    margin-right: 20px;

                }

                nav {
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
    </div>

</nav>

<?php } else { ?>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="row">
                <a href="#" class="brand-logo s2 push-s5" id="compagny">GTM MARATHON</a>
                <?php if ($_SESSION['roles'] === "admin") { ?>
                    <div class="right hide-on-med-and-down s2-pull-s3">
                        <!-- <span class="m-2"> -->
                        <!-- <i class="fa-solid fa-user mt-2"></i> -->
                        <span class=""><?= $_SESSION['email'] ?></span>


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


    <?php } ?>
    </div>
    </nav>

<?php
            $menu = ob_get_clean();


            require_once('vue/modele.php');
        // }
?>