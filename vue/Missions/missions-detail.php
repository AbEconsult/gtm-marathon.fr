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
    <a href="/" class="brand-logo">GTM MARATHON</a>

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

      <!-- <li><a href="/vue/Missions/missions.html">Missions</a></li> -->

      <li><a href="#"></span><?= $_SESSION['email'] ?></a></li>
      <li class="orange">
        <a href="modeles/deconnexion.php">
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

  <!-- <li><a href="/vue/Missions/missions.html">Missions</a></li> -->

  <li><a href="/profile/edit"></span><?= $_SESSION['email'] ?></a></li>
  <li class="orange">
    <a href="modeles/deconnexion.php">
      Déconnexion
      <i class="material-icons right"> exit_to_app</i>
    </a>
  </li>
</ul>

    <main class="container">
      <form name="appbundle_mission" method="post" autocomplete="off">
        <div class="row">
          <ul class="tabs">
            <li class="tab col s3">
              <a class="active" href="#informations">Informations</a>
            </li>
            <li class="tab col s3"><a href="#removal">Enlèvement</a></li>
            <li class="tab col s3"><a href="#delivery">Livraison</a></li>
            <li class="indicator" style="left: 0px; right: 474px"></li>
          </ul>

          <div id="informations" class="active">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Informations</span>

                <div class="row">
                  <div class="col s12 m6">
                    <div>
                      <label
                        for="appbundle_mission_reference"
                        class="required active"
                      >
                        Réference </label
                      ><input
                        type="text"
                        id="appbundle_mission_reference"
                        name="appbundle_mission[reference]"
                        required="required"
                        maxlength="14"
                        value="061119-163051"
                      />
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div>
                      <label class="required"> Demandée le </label>
                      <div id="appbundle_mission_requestedAt">
                        <div class="col s12 m6">
                          <div
                            class="modal datepicker-modal"
                            id="modal-bf504281-636a-1764-5456-3d3b0086e3a0"
                            tabindex="0"
                          >
                            <div class="modal-content datepicker-container">
                              <div class="datepicker-date-display">
                                <span class="year-text">2023</span
                                ><span class="date-text">Mer, Mai 6</span>
                              </div>
                              <div class="datepicker-calendar-container">
                                <div class="datepicker-calendar"></div>
                                <div class="datepicker-footer">
                                  <button
                                    class="btn-flat datepicker-clear waves-effect"
                                    style="visibility: hidden"
                                    type="button"
                                  ></button>
                                  <div class="confirmation-btns">
                                    <button
                                      class="btn-flat datepicker-cancel waves-effect"
                                      type="button"
                                    >
                                      Annuler</button
                                    ><button
                                      class="btn-flat datepicker-done waves-effect"
                                      type="button"
                                    >
                                      Ok
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <input
                            type="text"
                            id="appbundle_mission_requestedAt_date"
                            name="appbundle_mission[requestedAt][date]"
                            required="required"
                            class="datepicker"
                            value="06/05/2023"
                            maxlength="10"
                            placeholder="__/__/____"
                            autocomplete="off"
                          />
                        </div>
                        <div class="col s12 m6">
                          <div
                            class="modal timepicker-modal"
                            id="modal-3a42298d-f575-7d46-b271-0cf3c0af7ee1"
                            tabindex="0"
                          >
                            <div class="modal-content timepicker-container">
                              <div class="timepicker-digital-display">
                                <div class="timepicker-text-container">
                                  <div class="timepicker-display-column">
                                    <span
                                      class="timepicker-span-hours text-primary"
                                    ></span
                                    >:<span
                                      class="timepicker-span-minutes"
                                    ></span>
                                  </div>
                                  <div
                                    class="timepicker-display-column timepicker-display-am-pm"
                                  >
                                    <div class="timepicker-span-am-pm"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="timepicker-analog-display">
                                <div class="timepicker-plate">
                                  <div class="timepicker-canvas">
                                    <svg
                                      class="timepicker-svg"
                                      width="270"
                                      height="270"
                                    >
                                      <g transform="translate(135,135)">
                                        <line x1="0" y1="0"></line>
                                        <circle
                                          class="timepicker-canvas-bg"
                                          r="20"
                                        ></circle>
                                        <circle
                                          class="timepicker-canvas-bearing"
                                          cx="0"
                                          cy="0"
                                          r="4"
                                        ></circle>
                                      </g>
                                    </svg>
                                  </div>
                                  <div class="timepicker-dial timepicker-hours">
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 10px"
                                    >
                                      00
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 150px; top: 54.3782px"
                                    >
                                      1
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 175.622px; top: 80px"
                                    >
                                      2
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 185px; top: 115px"
                                    >
                                      3
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 175.622px; top: 150px"
                                    >
                                      4
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 150px; top: 175.622px"
                                    >
                                      5
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 185px"
                                    >
                                      6
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 80px; top: 175.622px"
                                    >
                                      7
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 54.3782px; top: 150px"
                                    >
                                      8
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 45px; top: 115px"
                                    >
                                      9
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 54.3782px; top: 80px"
                                    >
                                      10
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 80px; top: 54.3782px"
                                    >
                                      11
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 45px"
                                    >
                                      12
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 167.5px; top: 24.0673px"
                                    >
                                      13
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 205.933px; top: 62.5px"
                                    >
                                      14
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 220px; top: 115px"
                                    >
                                      15
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 205.933px; top: 167.5px"
                                    >
                                      16
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 167.5px; top: 205.933px"
                                    >
                                      17
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 220px"
                                    >
                                      18
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 62.5px; top: 205.933px"
                                    >
                                      19
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 24.0673px; top: 167.5px"
                                    >
                                      20
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 10px; top: 115px"
                                    >
                                      21
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 24.0673px; top: 62.5px"
                                    >
                                      22
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 62.5px; top: 24.0673px"
                                    >
                                      23
                                    </div>
                                  </div>
                                  <div
                                    class="timepicker-dial timepicker-minutes timepicker-dial-out"
                                  >
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 10px"
                                    >
                                      00
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 167.5px; top: 24.0673px"
                                    >
                                      05
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 205.933px; top: 62.5px"
                                    >
                                      10
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 220px; top: 115px"
                                    >
                                      15
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 205.933px; top: 167.5px"
                                    >
                                      20
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 167.5px; top: 205.933px"
                                    >
                                      25
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 115px; top: 220px"
                                    >
                                      30
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 62.5px; top: 205.933px"
                                    >
                                      35
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 24.0673px; top: 167.5px"
                                    >
                                      40
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 10px; top: 115px"
                                    >
                                      45
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 24.0673px; top: 62.5px"
                                    >
                                      50
                                    </div>
                                    <div
                                      class="timepicker-tick"
                                      style="left: 62.5px; top: 24.0673px"
                                    >
                                      55
                                    </div>
                                  </div>
                                </div>
                                <div class="timepicker-footer">
                                  <button
                                    class="btn-flat timepicker-clear waves-effect"
                                    style="visibility: hidden"
                                    type="button"
                                    tabindex="1"
                                  >
                                    Clear
                                  </button>
                                  <div class="confirmation-btns">
                                    <button
                                      class="btn-flat timepicker-close waves-effect"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Cancel</button
                                    ><button
                                      class="btn-flat timepicker-close waves-effect"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Ok
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <input
                            type="text"
                            id="appbundle_mission_requestedAt_time"
                            name="appbundle_mission[requestedAt][time]"
                            required="required"
                            class="timepicker"
                            value="16:30"
                            maxlength="5"
                            placeholder="__:__"
                            autocomplete="off"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div>
                    <label for="appbundle_mission_customer" class="required">
                      Client
                    </label>
                    <div class="row">
                      <div class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <input
                              type="text"
                              class="autocomplete"
                              id="appbundle_mission_customer_autocomplete"
                              field="appbundle_mission_customer"
                              required="required" value="GTM"
                            />
                            <ul class="app-autocomplete collection"></ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div hidden="true">
                      <select
                        class="browser-default"
                        id="appbundle_mission_customer"
                        name="appbundle_mission[customer]"
                        required="required"
                      >
                        <option value=""></option>
                        <option value="6" selected="selected">
                          GTM - 26 rue de la Paix, 02200 SOISSONS
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m6">
                    <div>
                      <label
                        for="appbundle_mission_assignedBy"
                        class="required"
                      >
                        Affecté par
                      </label>
                      <div class="row">
                        <div class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <input
                                type="text"
                                class="autocomplete"
                                id="appbundle_mission_assignedBy_autocomplete"
                                field="appbundle_mission_assignedBy"
                                required="required" value="Eric"
                              />
                              <ul class="app-autocomplete collection"></ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div hidden="true">
                        <select
                          class="browser-default"
                          id="appbundle_mission_assignedBy"
                          name="appbundle_mission[assignedBy]"
                          required="required"
                        >
                          <option value=""></option>
                          <option value="1" selected="selected">
                            ElAbjani Abel
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div>
                      <label for="appbundle_mission_driver" class="required">
                        Conducteur
                      </label>
                      <div class="row">
                        <div class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <input
                                type="text"
                                class="autocomplete"
                                id="appbundle_mission_driver_autocomplete"
                                field="appbundle_mission_driver"
                                required="required" value="Alexis"
                              />
                              <ul class="app-autocomplete collection"></ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div hidden="true">
                        <select
                          class="browser-default"
                          id="appbundle_mission_driver"
                          name="appbundle_mission[driver]"
                          required="required"
                        >
                          <option value=""></option>
                          <option value="4" selected="selected">
                            Yves DEVARENNE
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m3">
                    <div>
                      <label for="appbundle_mission_status" class="required">
                        Statut
                      </label>
                      <div class="row">
                        <div class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <input
                                type="text"
                                class="autocomplete"
                                id="appbundle_mission_status_autocomplete"
                                field="appbundle_mission_status" value ="En Attente"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div hidden="true">
                        <select
                          class="browser-default"
                          id="appbundle_mission_status"
                          name="appbundle_mission[status]"
                        >
                          <option value="opened" selected="selected">
                            Ouverte
                          </option>
                          <option value="closed">Fermée</option>
                          <option value="fenced">Clôturé</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col s12 m9">
                    <div>
                      <label for="appbundle_mission_observation">
                        Observations </label
                      ><textarea
                        id="appbundle_mission_observation"
                        name="appbundle_mission[observation]"
                        class="materialize-textarea"
                        style="height: 43px" value="Réserves signalées par le client au chargement"
                      ></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="removal" style="display:none">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Enlèvement</span>

                <div class="row">
                  <div>
                    <div id="appbundle_mission_removal">
                      <div>
                        <label
                          for="appbundle_mission_removal_address"
                          class="required"
                        >
                          Adresse
                        </label>
                        <div class="row">
                          <div class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input
                                  type="text"
                                  class="autocomplete"
                                  id="appbundle_mission_removal_address_autocomplete"
                                  field="appbundle_mission_removal_address"
                                />
                                <ul class="app-autocomplete collection"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div hidden="true">
                          <select
                            class="browser-default"
                            id="appbundle_mission_removal_address"
                            name="appbundle_mission[removal][address]"
                          >
                            <option value="4">298 Paul, 66000 Perpignan</option>
                            <option value="5">
                              1 rue de paris, 02200 SOISSONS
                            </option>
                            <option value="9">1 Rue Ognes, 02300 CHAUNY</option>
                            <option value="1">06 Jean, 91000 Paris</option>
                            <option value="2">
                              1 Avenue de Paris, 94000 RUNGIS
                            </option>
                            <option value="3">
                              1 Rue de l'église, 94000 RUNGIS
                            </option>
                            <option value="6">
                              1 rue de la Hurée, 94 RUNGIS
                            </option>
                            <option value="7">2 Jean, 9200 Paris</option>
                            <option value="8" selected="selected">
                              26 rue de la Paix, 02200 SOISSONS
                            </option>
                            <option value="10">
                              route de Paris, 75000 PARIS
                            </option>
                          </select>
                        </div>
                      </div>
                      <div>
                        <label class="required"> Heure de Rdv </label>
                        <div id="appbundle_mission_removal_arrival">
                          <div class="col s12 m6">
                            <div
                              class="modal datepicker-modal"
                              id="modal-93a932df-704f-2bc4-bd22-03aca3ba6ed0"
                              tabindex="0"
                            >
                              <div class="modal-content datepicker-container">
                                <div class="datepicker-date-display">
                                  <span class="year-text">2023</span
                                  ><span class="date-text">Mer, Mai 6</span>
                                </div>
                                <div class="datepicker-calendar-container">
                                  <div class="datepicker-calendar"></div>
                                  <div class="datepicker-footer">
                                    <button
                                      class="btn-flat datepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                    ></button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat datepicker-cancel waves-effect"
                                        type="button"
                                      >
                                        Annuler</button
                                      ><button
                                        class="btn-flat datepicker-done waves-effect"
                                        type="button"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_removal_arrival_date"
                              name="appbundle_mission[removal][arrival][date]"
                              required="required"
                              class="datepicker"
                              value="06/05/2023"
                              maxlength="10"
                              placeholder="__/__/____"
                              autocomplete="off"
                            />
                          </div>
                          <div class="col s12 m6">
                            <div
                              class="modal timepicker-modal"
                              id="modal-d14adf51-d9ac-dcf2-7108-22be332339d0"
                              tabindex="0"
                            >
                              <div class="modal-content timepicker-container">
                                <div class="timepicker-digital-display">
                                  <div class="timepicker-text-container">
                                    <div class="timepicker-display-column">
                                      <span
                                        class="timepicker-span-hours text-primary"
                                      ></span
                                      >:<span
                                        class="timepicker-span-minutes"
                                      ></span>
                                    </div>
                                    <div
                                      class="timepicker-display-column timepicker-display-am-pm"
                                    >
                                      <div class="timepicker-span-am-pm"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="timepicker-analog-display">
                                  <div class="timepicker-plate">
                                    <div class="timepicker-canvas">
                                      <svg
                                        class="timepicker-svg"
                                        width="270"
                                        height="270"
                                      >
                                        <g transform="translate(135,135)">
                                          <line x1="0" y1="0"></line>
                                          <circle
                                            class="timepicker-canvas-bg"
                                            r="20"
                                          ></circle>
                                          <circle
                                            class="timepicker-canvas-bearing"
                                            cx="0"
                                            cy="0"
                                            r="4"
                                          ></circle>
                                        </g>
                                      </svg>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-hours"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 54.3782px"
                                      >
                                        1
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 80px"
                                      >
                                        2
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 185px; top: 115px"
                                      >
                                        3
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 150px"
                                      >
                                        4
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 175.622px"
                                      >
                                        5
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 185px"
                                      >
                                        6
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 175.622px"
                                      >
                                        7
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 150px"
                                      >
                                        8
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 45px; top: 115px"
                                      >
                                        9
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 80px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 54.3782px"
                                      >
                                        11
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 45px"
                                      >
                                        12
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        13
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        14
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        16
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        17
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        18
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        19
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        21
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        22
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        23
                                      </div>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-minutes timepicker-dial-out"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        05
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        25
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        30
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        35
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        40
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        45
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        50
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        55
                                      </div>
                                    </div>
                                  </div>
                                  <div class="timepicker-footer">
                                    <button
                                      class="btn-flat timepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Clear
                                    </button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Cancel</button
                                      ><button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_removal_arrival_time"
                              name="appbundle_mission[removal][arrival][time]"
                              required="required"
                              class="timepicker"
                              value="20:30"
                              maxlength="5"
                              placeholder="__:__"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                      <div>
                        <label> Départ </label>
                        <div id="appbundle_mission_removal_departure">
                          <div class="col s12 m6">
                            <div
                              class="modal datepicker-modal"
                              id="modal-bf94f3f9-134f-10a6-170d-dd2d796ba4bb"
                              tabindex="0"
                            >
                              <div class="modal-content datepicker-container">
                                <div class="datepicker-date-display">
                                  <span class="year-text">2023</span
                                  ><span class="date-text">Mer, Mai 6</span>
                                </div>
                                <div class="datepicker-calendar-container">
                                  <div class="datepicker-calendar"></div>
                                  <div class="datepicker-footer">
                                    <button
                                      class="btn-flat datepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                    ></button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat datepicker-cancel waves-effect"
                                        type="button"
                                      >
                                        Annuler</button
                                      ><button
                                        class="btn-flat datepicker-done waves-effect"
                                        type="button"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_removal_departure_date"
                              name="appbundle_mission[removal][departure][date]"
                              class="datepicker"
                              value="06/05/2023"
                              maxlength="10"
                              placeholder="__/__/____"
                              autocomplete="off"
                            />
                          </div>
                          <div class="col s12 m6">
                            <div
                              class="modal timepicker-modal"
                              id="modal-5964f098-1de9-5cd7-d551-1b36a1246a25"
                              tabindex="0"
                            >
                              <div class="modal-content timepicker-container">
                                <div class="timepicker-digital-display">
                                  <div class="timepicker-text-container">
                                    <div class="timepicker-display-column">
                                      <span
                                        class="timepicker-span-hours text-primary"
                                      ></span
                                      >:<span
                                        class="timepicker-span-minutes"
                                      ></span>
                                    </div>
                                    <div
                                      class="timepicker-display-column timepicker-display-am-pm"
                                    >
                                      <div class="timepicker-span-am-pm"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="timepicker-analog-display">
                                  <div class="timepicker-plate">
                                    <div class="timepicker-canvas">
                                      <svg
                                        class="timepicker-svg"
                                        width="270"
                                        height="270"
                                      >
                                        <g transform="translate(135,135)">
                                          <line x1="0" y1="0"></line>
                                          <circle
                                            class="timepicker-canvas-bg"
                                            r="20"
                                          ></circle>
                                          <circle
                                            class="timepicker-canvas-bearing"
                                            cx="0"
                                            cy="0"
                                            r="4"
                                          ></circle>
                                        </g>
                                      </svg>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-hours"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 54.3782px"
                                      >
                                        1
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 80px"
                                      >
                                        2
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 185px; top: 115px"
                                      >
                                        3
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 150px"
                                      >
                                        4
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 175.622px"
                                      >
                                        5
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 185px"
                                      >
                                        6
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 175.622px"
                                      >
                                        7
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 150px"
                                      >
                                        8
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 45px; top: 115px"
                                      >
                                        9
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 80px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 54.3782px"
                                      >
                                        11
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 45px"
                                      >
                                        12
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        13
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        14
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        16
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        17
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        18
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        19
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        21
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        22
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        23
                                      </div>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-minutes timepicker-dial-out"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        05
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        25
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        30
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        35
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        40
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        45
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        50
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        55
                                      </div>
                                    </div>
                                  </div>
                                  <div class="timepicker-footer">
                                    <button
                                      class="btn-flat timepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Clear
                                    </button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Cancel</button
                                      ><button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_removal_departure_time"
                              name="appbundle_mission[removal][departure][time]"
                              class="timepicker"
                              value="23:30"
                              maxlength="5"
                              placeholder="__:__"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                      <div>
                        <label for="appbundle_mission_removal_observation">
                          Observations </label
                        ><textarea
                          id="appbundle_mission_removal_observation"
                          name="appbundle_mission[removal][observation]"
                          class="materialize-textarea"
                          style="height: 43px"
                        ></textarea>
                      </div>
                      <div>
                        <input
                          type="text"
                          id="appbundle_mission_removal_signature"
                          name="appbundle_mission[removal][signature]"
                          class="red"
                          value="14"
                          hidden="hidden"
                        />
                      </div>
                      <div>
                        <label
                          for="appbundle_mission_removal_plannedQuantity"
                          class="active"
                        >
                          Quantité prévue </label
                        ><input
                          type="number"
                          id="appbundle_mission_removal_plannedQuantity"
                          name="appbundle_mission[removal][plannedQuantity]"
                          maxlength="4"
                          placeholder="____"
                          autocomplete="off"
                        />
                      </div>
                      <div>
                        <label
                          for="appbundle_mission_removal_loadedQuantity"
                          class="active"
                        >
                          Quantité chargée </label
                        ><input
                          type="number"
                          id="appbundle_mission_removal_loadedQuantity"
                          name="appbundle_mission[removal][loadedQuantity]"
                          maxlength="4"
                          placeholder="____"
                          autocomplete="off"
                        />
                      </div>
                      <div>
                        <label
                          for="appbundle_mission_removal_weight"
                          class="active"
                        >
                          Poids </label
                        ><input
                          type="text"
                          id="appbundle_mission_removal_weight"
                          name="appbundle_mission[removal][weight]"
                          maxlength="4"
                          placeholder="____"
                          autocomplete="off"
                        />
                      </div>
                      <div>
                        <label
                          for="appbundle_mission_removal_weightUnit"
                          class="required"
                        >
                          Unité
                        </label>
                        <div class="row">
                          <div class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input
                                  type="text"
                                  class="autocomplete"
                                  id="appbundle_mission_removal_weightUnit_autocomplete"
                                  field="appbundle_mission_removal_weightUnit"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div hidden="true">
                          <select
                            class="browser-default"
                            id="appbundle_mission_removal_weightUnit"
                            name="appbundle_mission[removal][weightUnit]"
                          >
                            <option value="Kg" selected="selected">Kg</option>
                            <option value="Tonnes">Tonnes</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <img
                  src="vue/Missions/images/0cd997cd9ffb809db10fc5fb6c4dbd7b.png"
                  id="signature-removal-render"
                />
              </div>
            </div>
          </div>
          <div id="delivery" style="display:none">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Livraison</span>

                <div class="row">
                  <div>
                    <div id="appbundle_mission_delivery">
                      <div>
                        <label
                          for="appbundle_mission_delivery_address"
                          class="required"
                        >
                          Adresse
                        </label>
                        <div class="row">
                          <div class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input
                                  type="text"
                                  class="autocomplete"
                                  id="appbundle_mission_delivery_address_autocomplete"
                                  field="appbundle_mission_delivery_address"
                                />
                                <ul class="app-autocomplete collection"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div hidden="true">
                          <select
                            class="browser-default"
                            id="appbundle_mission_delivery_address"
                            name="appbundle_mission[delivery][address]"
                          >
                            <option value="4" selected="selected">
                              298 Paul, 66000 Perpignan
                            </option>
                            <option value="5">
                              1 rue de paris, 02200 SOISSONS
                            </option>
                            <option value="9">1 Rue Ognes, 02300 CHAUNY</option>
                            <option value="1">06 Jean, 91000 Paris</option>
                            <option value="2">
                              1 Avenue de Paris, 94000 RUNGIS
                            </option>
                            <option value="3">
                              1 Rue de l'église, 94000 RUNGIS
                            </option>
                            <option value="6">
                              1 rue de la Hurée, 94 RUNGIS
                            </option>
                            <option value="7">2 Jean, 9200 Paris</option>
                            <option value="8">
                              26 rue de la Paix, 02200 SOISSONS
                            </option>
                            <option value="10">
                              route de Paris, 75000 PARIS
                            </option>
                          </select>
                        </div>
                      </div>
                      <div>
                        <label class="required"> Heure de Rdv </label>
                        <div id="appbundle_mission_delivery_arrival">
                          <div class="col s12 m6">
                            <div
                              class="modal datepicker-modal"
                              id="modal-023dfb1f-0475-e810-71ba-11f721109d54"
                              tabindex="0"
                            >
                              <div class="modal-content datepicker-container">
                                <div class="datepicker-date-display">
                                  <span class="year-text">2023</span
                                  ><span class="date-text">Jeu, Mai 7</span>
                                </div>
                                <div class="datepicker-calendar-container">
                                  <div class="datepicker-calendar"></div>
                                  <div class="datepicker-footer">
                                    <button
                                      class="btn-flat datepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                    ></button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat datepicker-cancel waves-effect"
                                        type="button"
                                      >
                                        Annuler</button
                                      ><button
                                        class="btn-flat datepicker-done waves-effect"
                                        type="button"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_delivery_arrival_date"
                              name="appbundle_mission[delivery][arrival][date]"
                              required="required"
                              class="datepicker"
                              value="07/05/2023"
                              maxlength="10"
                              placeholder="__/__/____"
                              autocomplete="off"
                            />
                          </div>
                          <div class="col s12 m6">
                            <div
                              class="modal timepicker-modal"
                              id="modal-2c4757c3-0132-b3ba-bda5-b1bb7915347f"
                              tabindex="0"
                            >
                              <div class="modal-content timepicker-container">
                                <div class="timepicker-digital-display">
                                  <div class="timepicker-text-container">
                                    <div class="timepicker-display-column">
                                      <span
                                        class="timepicker-span-hours text-primary"
                                      ></span
                                      >:<span
                                        class="timepicker-span-minutes"
                                      ></span>
                                    </div>
                                    <div
                                      class="timepicker-display-column timepicker-display-am-pm"
                                    >
                                      <div class="timepicker-span-am-pm"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="timepicker-analog-display">
                                  <div class="timepicker-plate">
                                    <div class="timepicker-canvas">
                                      <svg
                                        class="timepicker-svg"
                                        width="270"
                                        height="270"
                                      >
                                        <g transform="translate(135,135)">
                                          <line x1="0" y1="0"></line>
                                          <circle
                                            class="timepicker-canvas-bg"
                                            r="20"
                                          ></circle>
                                          <circle
                                            class="timepicker-canvas-bearing"
                                            cx="0"
                                            cy="0"
                                            r="4"
                                          ></circle>
                                        </g>
                                      </svg>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-hours"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 54.3782px"
                                      >
                                        1
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 80px"
                                      >
                                        2
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 185px; top: 115px"
                                      >
                                        3
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 150px"
                                      >
                                        4
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 175.622px"
                                      >
                                        5
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 185px"
                                      >
                                        6
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 175.622px"
                                      >
                                        7
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 150px"
                                      >
                                        8
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 45px; top: 115px"
                                      >
                                        9
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 80px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 54.3782px"
                                      >
                                        11
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 45px"
                                      >
                                        12
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        13
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        14
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        16
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        17
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        18
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        19
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        21
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        22
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        23
                                      </div>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-minutes timepicker-dial-out"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        05
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        25
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        30
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        35
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        40
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        45
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        50
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        55
                                      </div>
                                    </div>
                                  </div>
                                  <div class="timepicker-footer">
                                    <button
                                      class="btn-flat timepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Clear
                                    </button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Cancel</button
                                      ><button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_delivery_arrival_time"
                              name="appbundle_mission[delivery][arrival][time]"
                              required="required"
                              class="timepicker"
                              value="16:30"
                              maxlength="5"
                              placeholder="__:__"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                      <div>
                        <label> Départ </label>
                        <div id="appbundle_mission_delivery_departure">
                          <div class="col s12 m6">
                            <div
                              class="modal datepicker-modal"
                              id="modal-59bfb848-4171-7458-7442-a25e8740a916"
                              tabindex="0"
                            >
                              <div class="modal-content datepicker-container">
                                <div class="datepicker-date-display">
                                  <span class="year-text">2023</span
                                  ><span class="date-text">Jeu, Mai 7</span>
                                </div>
                                <div class="datepicker-calendar-container">
                                  <div class="datepicker-calendar"></div>
                                  <div class="datepicker-footer">
                                    <button
                                      class="btn-flat datepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                    ></button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat datepicker-cancel waves-effect"
                                        type="button"
                                      >
                                        Annuler</button
                                      ><button
                                        class="btn-flat datepicker-done waves-effect"
                                        type="button"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_delivery_departure_date"
                              name="appbundle_mission[delivery][departure][date]"
                              class="datepicker"
                              value="07/05/2023"
                              maxlength="10"
                              placeholder="__/__/____"
                              autocomplete="off"
                            />
                          </div>
                          <div class="col s12 m6">
                            <div
                              class="modal timepicker-modal"
                              id="modal-128f29e9-82ee-0b7f-bde5-dbd4f3e2c813"
                              tabindex="0"
                            >
                              <div class="modal-content timepicker-container">
                                <div class="timepicker-digital-display">
                                  <div class="timepicker-text-container">
                                    <div class="timepicker-display-column">
                                      <span
                                        class="timepicker-span-hours text-primary"
                                      ></span
                                      >:<span
                                        class="timepicker-span-minutes"
                                      ></span>
                                    </div>
                                    <div
                                      class="timepicker-display-column timepicker-display-am-pm"
                                    >
                                      <div class="timepicker-span-am-pm"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="timepicker-analog-display">
                                  <div class="timepicker-plate">
                                    <div class="timepicker-canvas">
                                      <svg
                                        class="timepicker-svg"
                                        width="270"
                                        height="270"
                                      >
                                        <g transform="translate(135,135)">
                                          <line x1="0" y1="0"></line>
                                          <circle
                                            class="timepicker-canvas-bg"
                                            r="20"
                                          ></circle>
                                          <circle
                                            class="timepicker-canvas-bearing"
                                            cx="0"
                                            cy="0"
                                            r="4"
                                          ></circle>
                                        </g>
                                      </svg>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-hours"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 54.3782px"
                                      >
                                        1
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 80px"
                                      >
                                        2
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 185px; top: 115px"
                                      >
                                        3
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 175.622px; top: 150px"
                                      >
                                        4
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 150px; top: 175.622px"
                                      >
                                        5
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 185px"
                                      >
                                        6
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 175.622px"
                                      >
                                        7
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 150px"
                                      >
                                        8
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 45px; top: 115px"
                                      >
                                        9
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 54.3782px; top: 80px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 80px; top: 54.3782px"
                                      >
                                        11
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 45px"
                                      >
                                        12
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        13
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        14
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        16
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        17
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        18
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        19
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        21
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        22
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        23
                                      </div>
                                    </div>
                                    <div
                                      class="timepicker-dial timepicker-minutes timepicker-dial-out"
                                    >
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 10px"
                                      >
                                        00
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 24.0673px"
                                      >
                                        05
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 62.5px"
                                      >
                                        10
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 220px; top: 115px"
                                      >
                                        15
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 205.933px; top: 167.5px"
                                      >
                                        20
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 167.5px; top: 205.933px"
                                      >
                                        25
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 115px; top: 220px"
                                      >
                                        30
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 205.933px"
                                      >
                                        35
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 167.5px"
                                      >
                                        40
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 10px; top: 115px"
                                      >
                                        45
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 24.0673px; top: 62.5px"
                                      >
                                        50
                                      </div>
                                      <div
                                        class="timepicker-tick"
                                        style="left: 62.5px; top: 24.0673px"
                                      >
                                        55
                                      </div>
                                    </div>
                                  </div>
                                  <div class="timepicker-footer">
                                    <button
                                      class="btn-flat timepicker-clear waves-effect"
                                      style="visibility: hidden"
                                      type="button"
                                      tabindex="1"
                                    >
                                      Clear
                                    </button>
                                    <div class="confirmation-btns">
                                      <button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Cancel</button
                                      ><button
                                        class="btn-flat timepicker-close waves-effect"
                                        type="button"
                                        tabindex="1"
                                      >
                                        Ok
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <input
                              type="text"
                              id="appbundle_mission_delivery_departure_time"
                              name="appbundle_mission[delivery][departure][time]"
                              class="timepicker"
                              value="16:30"
                              maxlength="5"
                              placeholder="__:__"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                      <div>
                        <label for="appbundle_mission_delivery_observation">
                          Observations </label
                        ><textarea
                          id="appbundle_mission_delivery_observation"
                          name="appbundle_mission[delivery][observation]"
                          class="materialize-textarea"
                          style="height: 43px"
                        ></textarea>
                      </div>
                      <div>
                        <input
                          type="text"
                          id="appbundle_mission_delivery_signature"
                          name="appbundle_mission[delivery][signature]"
                          class="red"
                          value="15"
                          hidden="hidden"
                        />
                      </div>
                      <div>
                        <label for="appbundle_mission_delivery_reserve"> </label
                        ><label for="appbundle_mission_delivery_reserve">
                          <input
                            type="checkbox"
                            id="appbundle_mission_delivery_reserve"
                            name="appbundle_mission[delivery][reserve]"
                            value="1"
                          />
                          <span>Reserve</span>
                        </label>
                      </div>
                      <div>
                        <label for="appbundle_mission_delivery_handling">
                        </label
                        ><label for="appbundle_mission_delivery_handling">
                          <input
                            type="checkbox"
                            id="appbundle_mission_delivery_handling"
                            name="appbundle_mission[delivery][handling]"
                            value="1"
                          />
                          <span>Manutention</span>
                        </label>
                      </div>
                      <div>
                        <label for="appbundle_mission_delivery_received">
                        </label
                        ><label for="appbundle_mission_delivery_received">
                          <input
                            type="checkbox"
                            id="appbundle_mission_delivery_received"
                            name="appbundle_mission[delivery][received]"
                            value="1"
                          />
                          <span>Reçu</span>
                        </label>
                      </div>
                      <div>
                        <label class="required"> Objets transportés </label>
                        <div id="appbundle_mission_delivery_items">
                          <label for="appbundle_mission_delivery_items_1">
                            <input
                              type="checkbox"
                              id="appbundle_mission_delivery_items_1"
                              name="appbundle_mission[delivery][items][]"
                              value="1"
                            />
                            <span>Moto</span> </label
                          ><label for="appbundle_mission_delivery_items_1">
                          </label
                          ><label for="appbundle_mission_delivery_items_2">
                            <input
                              type="checkbox"
                              id="appbundle_mission_delivery_items_2"
                              name="appbundle_mission[delivery][items][]"
                              value="2"
                            />
                            <span>VL</span> </label
                          ><label for="appbundle_mission_delivery_items_2">
                          </label>
                        </div>
                      </div>
                      <div>
                        <label
                          for="appbundle_mission_delivery_paymentMethod"
                          class="required"
                        >
                          Paiement par
                        </label>
                        <div class="row">
                          <div class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input
                                  type="text"
                                  class="autocomplete"
                                  id="appbundle_mission_delivery_paymentMethod_autocomplete"
                                  field="appbundle_mission_delivery_paymentMethod"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div hidden="true">
                          <select
                            class="browser-default"
                            id="appbundle_mission_delivery_paymentMethod"
                            name="appbundle_mission[delivery][paymentMethod]"
                          >
                            <option value="1" selected="selected">CB</option>
                            <option value="2">Chèque</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <img
                  src="images/b387257c6c473f06cf7bdf4f05642a15.png"
                  id="signature-delivery-render"
                />
              </div>
            </div>
          </div>

          <input class="btn" type="submit" value="Mettre à jours" />
          <input
            type="hidden"
            id="appbundle_mission__token"
            name="appbundle_mission[_token]"
            value="M7HrPOyRa8KQWBhvkxPVhWK3MnSvAfdoUPGmmIP0Cgk"
          />

          <ul>
            <li>
              <a class="btn" href="/vue/Missions/missions.php">Retourner vers la liste</a>
            </li>
            <li>
              <form
                name="form"
                method="post"
                action="vue/missions.detail.php/9"
                autocomplete="off"
              >
                <input type="hidden" name="_method" value="DELETE" />
                <input class="btn red" type="submit" value="Delete" />
                <input
                  type="hidden"
                  id="form__token"
                  name="form[_token]"
                  value="ZwhaMQueQbE_MGNM5BAIYku4gv-7zIypv15o_MeTZt8"
                />
              </form>
            </li>
          </ul>
        </div>
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

    <script type="text/javascript">
      App.initSignature("removal");
      App.initSignature("delivery");

      App.initFormMission();
    </script>

    <div
      class="hiddendiv common"
      style="
        font-size: 16px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto,
          Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
        line-height: normal;
        padding: 11.2px 0px;
        width: 661.517px;
      "
    >
      <br />
    </div>
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
