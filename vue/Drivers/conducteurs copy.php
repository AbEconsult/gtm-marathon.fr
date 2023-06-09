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

  <nav>
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
    <div class="nav-wrapper">
      <a href="#" data-target="slide-out" class="sidenav-trigger"
        ><i class="material-icons">menu</i></a>
      <a href="/" class="brand-logo">GTM-MARATHON</a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/vue/Moderators/moderateurs.html">Modérateurs</a></li>

        <li><a href="/vue/Drivers/conducteurs.html">Conducteurs</a></li>

        <li><a href="/vue/Customers/clients.html">Clients</a></li>

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

        <li><a href="/vue/Missions/missions.html">Missions</a></li>

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
    <li><a href="/vue/Moderators/moderateurs-detail.html">Modérateurs</a></li>

    <li><a href="/vue/Drivers/conducteurs-detail.html">Conducteur</a></li>
    <li><a href="/vue/Customers/clients-detail.html">Clients</a></li>
    <li><a href="/vue/Parametres/parametres-mode_paiements.html">Mode de paiment</a></li>
    <li><a href="/vue/Parametres/parametres-type_livraison.html">Types de livraison</a></li>

    <li><a href="/vue/Missions/missions.html">Missions</a></li>

    <li><a href="/profile/edit">commercial@gtm-marathon.fr</a></li>
    <li class="orange">
      <a href="/logout">
        Déconnexion
        <i class="material-icons right"> exit_to_app</i>
      </a>
    </li>
  </ul>

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
</body>
