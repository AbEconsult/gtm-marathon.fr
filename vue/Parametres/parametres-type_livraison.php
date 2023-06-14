<?php
echo "<br> (2) - Je passe dans Clients";
if (!isset($_SESSION)) {
  echo "<br> (2a) je test si la session est toujours active dans - clients - et passe pour la 1ère fois ";
  echo "<br> (2b) je passe dans clients - pour la 1ère fois ";
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


      .row, .input-field{
          margin-bottom: 5px;
      }
      .checkbox-horizontal label{
          margin-right: 20px;

      }

                   nav { background-color: red !important; }


      @media print and (min-resolution: 50dpi){
              body{

                  width: 100%
              }
              nav{
                  display: none;
              }
          col s12 {
              width: 50%
          }
      }

      @media only screen and (min-width: 601px){
      .container {
          width: 98%;
      }
    }
    </style>
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger"
          ><i class="material-icons">menu</i></a
        >
        <a href="/" class="brand-logo">MARATHON</a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="/vue/Moderators/moderateurs.php">Modérateurs</a></li>

          <li><a href="/vue/Drivers/conducteurs.php">Conducteurs</a></li>

          <li><a href="/vue/Customers/clients.php">Clients</a></li>

          <li>
            <a class="dropdown-trigger" href="#!" data-target="dropdown1"
              >Paramètres<i class="material-icons right">arrow_drop_down</i></a
            >
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

          <li><a href="/missions">Missions</a></li>

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
      <li><a href="/vue/moderators/">Modérateurs</a></li>

      <li><a href="/vue/drivers/">Conducteur</a></li>
      <li><a href="/vue/customer/">Clients</a></li>
      <li><a href="/vue/paymentmethod">Mode de paiment</a></li>
      <li><a href="/vue/itemdelivery">Types de livraison</a></li>

      <li><a href="/missions">Missions</a></li>

      <li><a href="/profile/edit">commercial@gtm-marathon.fr</a></li>
      <li class="orange">
        <a href="/logout">
          Déconnexion
          <i class="material-icons right"> exit_to_app</i>
        </a>
      </li>
    </ul>

    <main class="container">
      <h3>Types de livraison</h3>

      <a
        class="btn-floating btn-large waves-effect waves-light red right"
        href="/vue/itemdelivery/new"
      >
        <i class="material-icons">add</i></a
      >
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="/vue/itemdelivery/1">1</a></td>
            <td>Moto</td>

            <td>
              <ul>
                <li>
                  <a class="btn orange" href="/vue/itemdelivery/1/edit"
                    >edit</a
                  >
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td><a href="/vue/itemdelivery/2">2</a></td>
            <td>VL</td>

            <td>
              <ul>
                <li>
                  <a class="btn orange" href="/vue/itemdelivery/2/edit"
                    >edit</a
                  >
                </li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
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
$menu = ob_get_clean();

require_once('vue/view_header.php');
require_once('vue/modele.php');