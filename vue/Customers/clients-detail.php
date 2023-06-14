<?php
if (!isset($_SESSION)) {
    session_start();
}

ob_start();
?>

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

<body>
  <!-- <style type="text/css">
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

      col s12 {clients.php
        width: 50%
      }
    }

    @media only screen and (min-width: 601px) {
      .container {
        width: 98%;
      }
    }
  </style> -->
<nav>
  <div class="nav-wrapper">
    <a href="#" data-target="slide-out" class="sidenav-trigger"
      ><i class="material-icons">menu</i></a
    >
    <a href="/" class="brand-logo">GTM MARATHON</a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="/vue/Moderators/moderateurs.html">Modérateurs</a></li>

      <li><a href="/vue/Drivers/conducteurs.html">Conducteurs</a></li>

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
      
      <li><a href="/vue/Missions/missions.html">Missions</a></li>


      <li><a href="#"><span><?= $_SESSION['email'] ?></span></a></li>
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
  <li><a href="/vue/moderators/moderateurs.html">Modérateurs</a></li>

  <li><a href="/vue/Drivers/conducteurs.html">Conducteur</a></li>
  <li><a href="/vue/Customers/clients.php">Clients</a></li>
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
    <h3>Fiche client</h3>

    <a class="btn" href="/vue/Customers/clients.php">Retour vers la liste</a>

    <ul class="tabs">
      <li class="tab col s3">
        <a class="active" href="#user">Utilisateur</a>
      </li>
      <li class="tab col s3">
        <a href="#customerInformation">Information client</a>
      </li>
      <li class="tab col s3">
        <a href="#addresses">
          Adresses client</a>
      </li>
      <li class="indicator" style="left: 0px; right: 505px;"></li>
    </ul>

    <div class="row form-mod" mod="edit">

      <form name="appbundle_customer" method="post" autocomplete="off">

        <div id="user" class="active">
          <div class="card">

            <div class="card-content">
              <span class="card-title"></span>
              <div>
                <label for="appbundle_customer_firstName" class="active">

                  Prénom

                </label><input type="text" id="appbundle_customer_firstName" name="appbundle_customer[firstName]"
                  maxlength="64" value="Devarenne"
                  style="background-image: url(&quot;moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png&quot;) !important; background-position: 98% 50% !important; background-size: 16px 16px !important; background-repeat: no-repeat !important; transition: background-position 0s ease 0s, background-size 0s ease 0s !important;">
              </div>
              <div>
                <label for="appbundle_customer_lastName" class="active">

                  Nom

                </label><input type="text" id="appbundle_customer_lastName" name="appbundle_customer[lastName]"
                  maxlength="64" value="Yves"
                  style="background-image: url(&quot;moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png&quot;) !important; background-position: 98% 50% !important; background-size: 16px 16px !important; background-repeat: no-repeat !important; transition: background-position 0s ease 0s, background-size 0s ease 0s !important;">
              </div>
              <div>
                <label for="appbundle_customer_email" class="required active">

                  Émail

                </label><input type="email" id="appbundle_customer_email" name="appbundle_customer[email]"
                  required="required" value="yves@marathon-str.fr"
                  style="background-image: url(&quot;moz-extension://d0548852-754e-4e40-8288-b74358214605/src/images/icons/icon-32.png&quot;) !important; background-position: 98% 50% !important; background-size: 16px 16px !important; background-repeat: no-repeat !important; transition: background-position 0s ease 0s, background-size 0s ease 0s !important;">
              </div>

            </div>

            <div class="card-action">
              <input class="btn orange" type="submit" value="Enregistrer">
            </div>
          </div>
        </div>

        <div id="customerInformation" style="display: none;">
          <div class="card">

            <div class="card-content">
              <span class="card-title">Nouveau client</span>
              <div>
                <label for="appbundle_customer_name" class="required active">

                  Nom

                </label><input type="text" id="appbundle_customer_name" name="appbundle_customer[name]"
                  required="required" maxlength="255" value="MARATHON">
              </div>

              <div>
                <label class="required">

                  Adresse de facturation

                </label>
                <div id="appbundle_customer_billingAddress">
                  <div>
                    <label for="appbundle_customer_billingAddress_streetNumber" class="active">

                      Numéro

                    </label><input type="text" id="appbundle_customer_billingAddress_streetNumber"
                      name="appbundle_customer[billingAddress][streetNumber]" maxlength="10" value="1">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_route" class="required active">

                      Route

                    </label><input type="text" id="appbundle_customer_billingAddress_route"
                      name="appbundle_customer[billingAddress][route]" required="required" maxlength="255"
                      value="Rue de l'église">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_locality" class="required active">

                      Ville

                    </label><input type="text" id="appbundle_customer_billingAddress_locality"
                      name="appbundle_customer[billingAddress][locality]" required="required" maxlength="255"
                      value="RUNGIS">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_postalCode" class="required active">

                      Code postal

                    </label><input type="text" id="appbundle_customer_billingAddress_postalCode"
                      name="appbundle_customer[billingAddress][postalCode]" required="required" maxlength="14"
                      value="94000">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_country" class="required active">

                      Pays

                    </label><input type="text" id="appbundle_customer_billingAddress_country"
                      name="appbundle_customer[billingAddress][country]" required="required" maxlength="255"
                      value="FRance">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_tel" class="active">

                      Numéro de téléphone

                    </label><input type="text" id="appbundle_customer_billingAddress_tel"
                      name="appbundle_customer[billingAddress][tel]" maxlength="17" value="014949494949">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_email" class="active">

                      E-mail de facturation

                    </label><input type="email" id="appbundle_customer_billingAddress_email"
                      name="appbundle_customer[billingAddress][email]" value="commercial@marathon-str.fr">
                  </div>
                  <div>
                    <label for="appbundle_customer_billingAddress_fax">

                      Fax

                    </label><input type="text" id="appbundle_customer_billingAddress_fax"
                      name="appbundle_customer[billingAddress][fax]" maxlength="32">
                  </div>
                </div>
              </div>

            </div>
            <div class="card-action">
              <input class="btn orange" type="submit" value="Enregistrer">
            </div>
          </div>
        </div>

        <input type="hidden" id="appbundle_customer__token" name="appbundle_customer[_token]"
          value="PWtirA--QEVifgukUKceOvzLYoWnUO68PwelZiRhpQM">
      </form>

      <div id="addresses" style="display:none">
        <div class="card ">

          <div class="card-content ">

            <div id="addressess-fields-list" class="row customerLocations" path="/api/customers/3/locations">
              <div class="card">
                <div class="card-content">
                  <div" class="row">
                    <div class="col s12 m4">
                      <label for=" location_0_interlocutor" class="">Interlocuteur</label><input
                        id="location_0_interlocutor" required="required" maxlength="32">
                    </div>
                    <div class="col s4 m4">
                      <label for="location_0_streetNumber" class="">N°</label><input id="location_0_streetNumber"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_route" class="">Rue</label><input id="location_0_route" required="required"
                        maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_postalCode" class="">Code postal</label><input id="location_0_postalCode"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_locality" class="">Ville</label><input id="location_0_locality"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_country" class="">Pays</label><input id="location_0_country"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_tel" class="">Tel</label><input id="location_0_tel" required="required"
                        maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_email" class="">Email</label><input id="location_0_email"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_fax" class="">Fax</label><input id="location_0_fax" required="required"
                        maxlength="32">
                    </div>
                  </div">
                </div>
                <div class="card-action"><button class="btn">enregister</button><button
                    class="btn red">supprimer</button></div>
              </div>
              <div class="card">
                <div class="card-content">
                  <div" class="row">
                    <div class="col s12 m4">
                      <label for="location_0_interlocutor" class="">Interlocuteur</label><input
                        id="location_0_interlocutor" required="required" maxlength="32">
                    </div>
                    <div class="col s4 m4">
                      <label for="location_0_streetNumber" class="">N°</label><input id="location_0_streetNumber"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_route" class="">Rue</label><input id="location_0_route" required="required"
                        maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_postalCode" class="">Code postal</label><input id="location_0_postalCode"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_locality" class="">Ville</label><input id="location_0_locality"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_country" class="">Pays</label><input id="location_0_country"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_tel" class="">Tel</label><input id="location_0_tel" required="required"
                        maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_email" class="">Email</label><input id="location_0_email"
                        required="required" maxlength="32">
                    </div>
                    <div class="col s12 m4">
                      <label for="location_0_fax" class="">Fax</label><input id="location_0_fax" required="required"
                        maxlength="32">
                    </div>
                  </div">
                </div>
                <div class="card-action"><button class="btn">enregister</button><button
                    class="btn red">supprimer</button></div>
              </div>
            </div>
            <div> <button type="button" class="btn addlocation" data-list="#addressess-fields-list"> ajouter une
                addresse </button> </div>
          </div>
        </div>
      </div>
    </div>
  </main>
    
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <div id="sp-notification-wrapper"
    style=" bottom: 5px !important; right: 5px !important; width: 370px !important; height: auto !important; position: fixed !important; resize: vertical !important; overflow: auto !important; overflow-x: hidden !important; z-index: 2147483647 !important; background: none !important; clip: auto !important; ">
  </div>
</body>
</html>
<?
$menu = ob_get_clean();

require_once('vue/view_header.php');
require_once('vue/modele.php');
