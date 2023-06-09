<?php //$titre = "<h1>Gestion des Missions1</h1>";

$contenu = '<style type="text/css">
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
<nav>
    <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="/" class="brand-logo">GTM-MARATHON</a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php?action=moderateur">Modérateurs</a></li>

            <li><a href="index.php?action=conducteur">Conducteurs</a></li>

            <li><a href="index.php?action=client">Clients</a></li>

            <li>
                <a class="dropdown-trigger" href="#!" data-target="dropdown1">Paramètres<i class="material-icons right">arrow_drop_down</i></a>
                <ul id="dropdown1" class="dropdown-content" tabindex="0">
                    <li tabindex="0">
                        <a href="/vue/Parametres/parametres-mode_paiements.html">Mode de paiment</a>
                    </li>
                    <li tabindex="0">
                        <a href="/vue/Parametres/parametres-type_livraison.html">Types de livraison</a>
                    </li>
                </ul>
            </li>

            <span> </span>

            <li><a href="index.php?action=mission">Missions</a></li>

            <li><a href="#">commercial@gtm-marathon.fr</a></li>
            <li class="orange">
                <a href="/logout">
                    Déconnexion
                    <i class="material-icons right"> exit_to_app</i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<ul id="slide-out" class="sidenav">
    <li><a href="index.php?$action=moderateur">Modérateurs</a></li>

    <li><a href="/vue/Drivers/">Conducteur</a></li>
    <li><a href="/vue/customers/">Clients</a></li>
    <li><a href="/vue/Parametres/parametres-mode_paiements.html">Mode de paiment</a></li>
    <li><a href="/vue/Parametres/parametres-type_livraison.html">Types de livraison</a></li>

    <li><a href="/missions">Missions</a></li>

    <li><a href="/profile/edit">commercial@gtm-marathon.fr</a></li>
    <li class="orange">
        <a href="/logout">
            Déconnexion
            <i class="material-icons right"> exit_to_app</i>
        </a>
    </li>
</ul>';

echo "<br> (3) - Je passe dans view_header";
