<?php
echo "<br> (2) - Je passe dans Conducteurs";
if (!isset($_SESSION)) {
  echo "<br> (2a) je test si la session est toujours active dans - conducteurs - et passe pour la 1ère fois ";
  echo "<br> (2b) je passe dans conducteurs - pour la 1ère fois ";
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

  <main class="container">
    <h3>Les conducteurs</h3>

    <a
      class="btn-floating btn-large waves-effect waves-light red right"
      href="/vue/drivers/new"
    >
      <i class="material-icons">add</i></a
    >

    <table class="striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2</td>
          <td>Abel</td>
          <td>GTM-MARATHON</td>
          <td>
            <a class="btn orange" href="/vue/drivers/2/edit">Modifier</a>

            <button class="btn red disableProfile" profileid="2">
              Désactiver
            </button>
            <button
              class="btn green enableProfile"
              style="display: none"
              profileid="2"
            >
              Réactiver
            </button>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>DEVARENNE</td>
          <td>Yves</td>
          <td>
            <a class="btn orange" href="/vue/drivers/4/edit">Modifier</a>

            <button class="btn red disableProfile" profileid="4">
              Désactiver
            </button>
            <button
              class="btn green enableProfile"
              style="display: none"
              profileid="4"
            >
              Réactiver
            </button>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Jean</td>
          <td>Jean</td>
          <td>
            <a class="btn orange" href="/vue/drivers/5/edit">Modifier</a>

            <button class="btn red disableProfile" profileid="5">
              Désactiver
            </button>
            <button
              class="btn green enableProfile"
              style="display: none"
              profileid="5"
            >
              Réactiver
            </button>
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

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {});
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
</body>';
<?
$menu = ob_get_clean();

require_once('vue/view_header.php');
require_once('vue/modele.php');
