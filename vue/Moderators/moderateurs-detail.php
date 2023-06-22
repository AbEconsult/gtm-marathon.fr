<?php


if (!isset($_SESSION)) {

  session_start();
}

ob_start();

?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex" />
    <meta name="googlebot" content="noindex" />
    <title>Marathon - Welcome!</title>

    <!--Import Google Icon Font-->

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="/public/css/materialize.min.css" />
  <link rel="stylesheet" type="text/css" href="/public/css/app.css" />
  <link rel="stylesheet" type="text/css" href="/public/css/style.css" />

    <!--Import JQuery -->
    <script src="/public/js/jquery.js"></script>

    <!-- Materialize -->
    <script src="/public/js/materialize.min.js"></script>

    <!--  Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Signature Pad -->
    <script src="/public/js/signature-pad.js"></script>
    <!-- Jquery Mask -->
    <script src="/public/js/jquery.mask.min.js"></script>
    <!-- App -->
    <script type="text/javascript" src="/public/js/app.js"></script>

    
  </head>
  <body>
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
    <a href="/" class="brand-logo">GTM MARATHON</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="/">Accueil</a></li>
      
      <!-- <li><a href="/vue/moderators/moderateurs.php">Modérateurs</a></li> -->

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

      <li><a href="/vue/Missions/missions.php">Missions</a></li>

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
  <li><a href="accueil">Accueil</a></li>
  <!-- <li><a href="/vue/moderators/moderateurs.php">Modérateurs</a></li> -->
  <li><a href="/vue/Drivers/conducteurs.php">Conducteur</a></li>
  <li><a href="/vue/Customers/clients.php">Clients</a></li>
  <li><a href="/vue/Parametres/parametres-mode_paiements.php">Mode de paiment</a></li>
  <li><a href="/vue/Parametres/parametres-type_livraison.php">Types de livraison</a></li>

  <li><a href="/vue/Missions/missions.php">Missions</a></li>

  <li><a href="/profile/edit"></span><?= $_SESSION['email'] ?></a></li>
  <li class="orange">
    <a href="/modeles/deconnexion.php">
      Déconnexion
      <i class="material-icons right"> exit_to_app</i>
    </a>
  </li>
</ul>

    <main class="container">
      <form name="appbundle_profile" method="post" autocomplete="off">
        <div id="appbundle_profile">
        <div>
            <label for="appbundle_profile_lastName" class="active"> Nom </label
            ><input
              type="text"
              id="appbundle_profile_lastName"
              name="appbundle_profile[lastName]"
              maxlength="64"
              value="ELABJANI"
              style="
                background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                background-position: 98% 50% !important;
                background-size: 16px 16px !important;
                background-repeat: no-repeat !important;
                transition: background-position 0s ease 0s,
                  background-size 0s ease 0s !important;
                cursor: default;
              "
            />
          </div>
          <div>
            <label for="appbundle_profile_firstName" class="active">
              Prénom </label
            ><input
              type="text"
              id="appbundle_profile_firstName"
              name="appbundle_profile[firstName]"
              maxlength="64"
              value="Abel"
              style="
                background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                background-position: 98% 50% !important;
                background-size: 16px 16px !important;
                background-repeat: no-repeat !important;
                transition: background-position 0s ease 0s,
                  background-size 0s ease 0s !important;
                cursor: pointer;
              "
            />
          </div>
          
          <div>
            <label for="appbundle_profile_email" class="required active">
              Émail </label
            ><input
              type="email"
              id="appbundle_profile_email"
              name="appbundle_profile[email]"
              required="required"
              value="commercial@groupetransportmarathon.fr"
              style="
                background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                background-position: 98% 50% !important;
                background-size: 16px 16px !important;
                background-repeat: no-repeat !important;
                transition: background-position 0s ease 0s,
                  background-size 0s ease 0s !important;
                cursor: default;
              "
            />
          </div>
          <div>
            <label class="required"> Adresse de facturation </label>
            <div id="appbundle_profile_billingAddress">
              <div>
                <label
                  for="appbundle_profile_billingAddress_streetNumber"
                  class="active"
                >
                  Numéro </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_streetNumber"
                  name="appbundle_profile[billingAddress][streetNumber]"
                  maxlength="10"
                  value="06"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_route"
                  class="required active"
                >
                  Route </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_route"
                  name="appbundle_profile[billingAddress][route]"
                  required="required"
                  maxlength="255"
                  value="Jean"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_locality"
                  class="required active"
                >
                  Ville </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_locality"
                  name="appbundle_profile[billingAddress][locality]"
                  required="required"
                  maxlength="255"
                  value="Paris"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_postalCode"
                  class="required active"
                >
                  Code postal </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_postalCode"
                  name="appbundle_profile[billingAddress][postalCode]"
                  required="required"
                  maxlength="14"
                  value="91000"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_country"
                  class="required active"
                >
                  Pays </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_country"
                  name="appbundle_profile[billingAddress][country]"
                  required="required"
                  maxlength="255"
                  value="France"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_tel"
                  class="active"
                >
                  Numéro de téléphone </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_tel"
                  name="appbundle_profile[billingAddress][tel]"
                  maxlength="17"
                  value="066666666"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_email"
                  class="active"
                >
                  E-mail de facturation </label
                ><input
                  type="email"
                  id="appbundle_profile_billingAddress_email"
                  name="appbundle_profile[billingAddress][email]"
                  value="commercial@groupetransportmarathon.fr"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
              <div>
                <label
                  for="appbundle_profile_billingAddress_fax"
                  class="active"
                >
                  Fax </label
                ><input
                  type="text"
                  id="appbundle_profile_billingAddress_fax"
                  name="appbundle_profile[billingAddress][fax]"
                  maxlength="32"
                  value="045354554654"
                  style="
                    background-image: url('moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png') !important;
                    background-position: 98% 50% !important;
                    background-size: 16px 16px !important;
                    background-repeat: no-repeat !important;
                    transition: background-position 0s ease 0s,
                      background-size 0s ease 0s !important;
                  "
                />
              </div>
            </div>
          </div>
          <input
            type="hidden"
            id="appbundle_profile__token"
            name="appbundle_profile[_token]"
            value="ZPuC6F7Y-dK6TpN7hij6LxpjTo67Fs4X0fp0ytTwPGo"
          />
        </div>
        <input class="btn orange" type="submit" value="Enregister" />
        <a class="btn" href="/vue/Moderators/moderateurs.php">Retour vers la liste</a>
      </form>
    </main>

    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function () {
        window.onerror = function (error) {
          //alert(JSON.stringify(error));
        };
        App.init();

        document.querySelectorAll("form").forEach(function (item) {
          item.setAttribute("autocomplete", "off");
        });
      });
    </script>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <div
      id="sp-notification-wrapper"
      style="
        bottom: 5px !important;
        right: 5px !important;
        width: 370px !important;
        height: auto !important;
        position: fixed !important;
        resize: vertical !important;
        overflow: auto !important;
        overflow-x: hidden !important;
        z-index: 2147483647 !important;
        background: none !important;
        clip: auto !important;
      "
    ></div>
  </body>
</html>
<?
$contenu = ob_get_clean();

require_once("vue/view_header.php");
require_once('vue/modele.php');
