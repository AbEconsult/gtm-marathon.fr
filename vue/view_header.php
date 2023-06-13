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

            <div>
                <span id="compagny">GTM-MARATHON</span>
            </div>
    </div>

</nav>

<?php } else { ?>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <div class="nav-wrapper">

            <?php if ($_SESSION['roles'] === "admin") { ?>
                <div class="container">
                    <div class="navbar-nav m-9">
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a></li>
                            <li><a class="right hide-on-med-and-down <?php active('ajouter-client'); ?>" href="newcli">Client</a></li>
                            <li><a class="right hide-on-med-and-down <?php active('ajouter-utilisateur'); ?>" href="newUser">Conducteurs</a></li>
                            <li><a class="right hide-on-med-and-down <?php active('missions'); ?>" href="missions">Missions</a></li>
                    </div>
                    <?php if ($_SESSION['roles'] === "moderator") { ?>
                        <div class="navbar-nav m-9">
                            <a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a>
                            <a class="right hide-on-med-and-down <?php active('ajouter-client'); ?>" href="newcli">Client</a>
                            <a class="right hide-on-med-and-down <?php active('missions'); ?>" href="missions">Missions</a>
                        </div>
                    <?php } elseif ($_SESSION['roles'] === "user" or $_SESSION['roles'] === "customer") { ?>
                        <div class="navbar-nav m-9">
                            <a class="right hide-on-med-and-down <?php active('accueil'); ?>" aria-current="page" href="accueil">Accueil</a>
                            <a class="right hide-on-med-and-down <?php active('missions'); ?>" href="missions">Missions</a>
                        </div>
                    <?php } ?>
                    
                    <div class="right hide-on-med-and-down">
                        <!-- <span class="m-2"> -->
                            <!-- <i class="fa-solid fa-user mt-2"></i> -->
                            <span class=""></span><?= $_SESSION['email'] ?></span>
                            <span> </span>
                            <span class="navbar-nav m-3">
                                <a class="right hide-on-med-and-down orange" href='modeles/deconnexion.php'>deconnexion</a>
                            </span>
                        <!-- </span> -->
                    </div>
                </div>


    <?php } ?>
    </div>
    </nav>

<?php
            $menu = ob_get_clean();


            require_once('vue/modele.php');
        }
?>