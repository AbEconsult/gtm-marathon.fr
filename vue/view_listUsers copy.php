<?php

if (!isset($_SESSION)) {

    session_start();
  }
  
  ob_start();
  
  ?>
  <html>
  
  <head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <title>Marathon - Welcome!</title>
  
    <!--Import Google Icon Font-->
  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="/public/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/app.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
  
    <!--Import JQuery -->
    <script src="/public/js/jquery.js"></script>
  
    <!-- Materialize -->
    <script src="/public/js/materialize.min.js"></script>
  
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
    <!-- Signature Pad -->
    <script src="/public/js/signature-pad.js"></script>
    <!-- Jquery Mask -->
    <script src="/public/js/jquery.mask.min.js"></script>
    <!-- App -->
    <script type="text/javascript" src="/public/js/app.js"></script>
  
  
  </head>
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
  <nav>
    <div class="nav-wrapper">
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a href="/" class="brand-logo">GTM</a>
  
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/">Accueil</a></li>
        <li><a href="/vue/moderators/moderateurs.php">Modérateurs</a></li>
  
        <li><a href="/vue/Drivers/conducteurs.php">Conducteurs</a></li>
  
        <li><a href="/vue/Customers/clients.php">Clients</a></li>
  
        <li>
          <a class="dropdown-trigger" href="#!" data-target="dropdown1">Paramètres<i class="material-icons right">arrow_drop_down</i></a>
          <ul id="dropdown1" class="dropdown-content" tabindex="0">
            <li tabindex="0">
              <a href="/vue/Parametres/parametres-mode_paiements.php">Mode de paiment</a>
            </li>
            <li tabindex="0">
              <a href="/vue/Parametres/parametres-type_livraison.php">Types de livraison</a>
            </li>
          </ul>
        </li>
  
        <span> </span>
  
        <!-- <li><a href="/vue/vue/Missions/missions.phpmissions.html">Missions</a></li> -->
  
        <li><a href="#"></span><?= $_SESSION['email'] ?></a></li>
        <li class="orange">
          <a href="/modeles/deconnexion.php">
            Déconnexion
            <i class="material-icons right"> exit_to_app</i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Accès Mobile -->
  <ul id="slide-out" class="sidenav">
    <li><a href="/">Accueil</a></li>
    <li><a href="/vue/moderators/moderateurs.php">Modérateurs</a></li>
  
    <li><a href="/vue/Drivers/conducteurs.php">Conducteur</a></li>
    <li><a href="/vue/Customers/clients.php">Clients</a></li>
    <li><a href="/vue/Parametres/parametres-mode_paiements.php">Mode de paiment</a></li>
    <li><a href="/vue/Parametres/parametres-type_livraison.php">Types de livraison</a></li>
  
    <!-- <li><a href="/vue/vue/Missions/missions.phpmissions.html">Missions</a></li> -->
  
    <li><a href="/profile/edit"></span><?= $_SESSION['email'] ?></a></li>
    <li class="orange">
      <a href="/modeles/deconnexion.php">
        Déconnexion
        <i class="material-icons right"> exit_to_app</i>
      </a>
    </li>
  </ul>
  <?
$titre = "Liste Users";
$contenu = "";
$contenu_alert = "";

if (isset($UserList)){
echo "<br> xx) je passe le contrôle du contenu de UserList dans view_listUsers ";
$tlist = count($UserList);

// if ($view_listUsers === 0){
//     $view_listUsers=1;
// }else {
//     $view_listUsers++;
// }
// echo "<br> passage dans view_listUsers= ".$view_listUsers;

foreach ($UserList as $users) {
    $contenu .= "<Nom> Id :" . $users['id']
        . "</br>Nom : " . $users['us_nom_user']
        . "</br>Prenom : " . $users['us_prenom_user']
        . "</br>Email : " . $users['us_email']
        . "</br>Profil : " . $users['roles']
        . "<hr>";
    if ($users['roles'] != 0) {
        $contenu .= "<form action='index.php' method='GET'></br>"
            . "<input type='submit' name='action' value='updateUsers'>"
            . "<input type='submit' name='action' value='deleteUsers'></br>"
            . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
            . "</form>";
    }

    if (count($UserList) === 1) {
        $contenu .= "<form action='index.php' method='GET'></br>"
            . "<input type='submit' name='action' value='updateUsers'>"
            . "<input type='submit' name='action' value='deleteUsers'></br>"
            . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
            . "</form>";
    } else if (count($UserList) === 0) {
        $contenu_alert = "<h2> Aucun enregitrement trouvé </h2>";
    }
}
require("vue/modele.php");
}