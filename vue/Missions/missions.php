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
      <h3>Missions</h3>
      <div class="row">
        <a
          class="btn-floating btn-large waves-effect waves-light red right"
          href="vue/Missions/missions_new"
        >
          <i class="material-icons">add</i>
        </a>
      </div>

      <div class="row">
        <form name="mission_filter" method="post" autocomplete="off">
          <div class="col m2 s12">
            <div>
              <label for="mission_filter_reference"> Réference </label
              ><input
                type="text"
                id="mission_filter_reference"
                name="mission_filter[reference]"
              />
            </div>
          </div>

          <div class="col m2 s12">
            <div>
              <label for="mission_filter_assignedBy"> Affecté par </label>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input
                        type="text"
                        class="autocomplete"
                        id="mission_filter_assignedBy_autocomplete"
                        field="mission_filter_assignedBy"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div hidden="true">
                <select
                  class="browser-default"
                  id="mission_filter_assignedBy"
                  name="mission_filter[assignedBy]"
                >
                  <option value=""></option>
                  <option value="1">ElAbjani</option>
                  <option value="7">Eric</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col m2 s12">
            <div>
              <label for="mission_filter_requestedAt"> Demandée le </label
              ><input
                type="text"
                id="mission_filter_requestedAt"
                name="mission_filter[requestedAt]"
              />
            </div>
          </div>

          <div class="col m2 s12">
            <div>
              <label for="mission_filter_customer"> Client </label>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input
                        type="text"
                        class="autocomplete"
                        id="mission_filter_customer_autocomplete"
                        field="mission_filter_customer"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div hidden="true">
                <select
                  class="browser-default"
                  id="mission_filter_customer"
                  name="mission_filter[customer]"
                >
                  <option value=""></option>
                  <option value="3">MARATHON</option>
                  <option value="6">GTM</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col m2 s12">
            <input
              type="hidden"
              id="mission_filter__token"
              name="mission_filter[_token]"
              value="DICzu4Q-2hB_Q7EiAqlWxpdOHzj3vJpkDLgJq3-Vt4U"
            />
          </div>

          <input class="btn" type="submit" value="Filtrer" />
        </form>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <a
            class="btn"
            href="/missions/?sort=m.reference&amp;direction=asc&amp;page=1"
            title="Reference"
            >Reference
            <i class="material-icons"> arrow_drop_up </i>
          </a>
        </div>
        <div class="col s12 m3">
          <a
            class="btn"
            href="/missions/?sort=c.id&amp;direction=asc&amp;page=1"
            title="Client"
            >Client
            <i class="material-icons"> arrow_drop_up </i>
          </a>
        </div>
        <div class="col s12 m3">
          <a
            class="btn"
            href="/missions/?sort=m.requestedAt&amp;direction=asc&amp;page=1"
            title="Demander le"
            >Demander le
            <i class="material-icons"> arrow_drop_up </i>
          </a>
        </div>
      </div>

      <div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>9</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-163051</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>GTM</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>Yves DEVARENNE</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 16:30</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  26 rue de la Paix, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/9">Afficher</a>

              <a class="btn orange" href="/missions/9/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/9/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>8</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-141554</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 14:15</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/8">Afficher</a>

              <a class="btn orange" href="/missions/8/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/8/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>7</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-140529</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 14:05</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/7">Afficher</a>

              <a class="btn orange" href="/missions/7/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/7/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>6</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-135806</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 13:58</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/6">Afficher</a>

              <a class="btn orange" href="/missions/6/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/6/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>5</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-121336</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>Yves DEVARENNE</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 12:13</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/5">Afficher</a>

              <a class="btn orange" href="/missions/5/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/5/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>4</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>061119-114429</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>Yves DEVARENNE</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>06-05-2023 11:44</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/4">Afficher</a>

              <a class="btn orange" href="/missions/4/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/4/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>3</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>171218-091325</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>17-05-2023 09:13</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/3">Afficher</a>

              <a class="btn orange" href="/missions/3/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/3/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>2</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>071218-173616</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>07-05-2023 17:36</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/2">Afficher</a>

              <a class="btn orange" href="/missions/2/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/2/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3">ID: </label>
                  <span>1</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Réference: </label>
                  <span>131118-201354</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Affecté par: </label>
                  <span>ElAbjani Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Client: </label>
                  <span>MARATHON</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Conducteur: </label>
                  <span>GTM Abel</span>
                </div>
                <div class="row">
                  <label class="col s4 m3">Demandée le: </label>

                  <span>13-05-2023 20:13</span>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons green-text">location_on</i>
                    Enlèvement
                  </label>
                  1 rue de paris, 02200 SOISSONS
                </div>
                <hr />
                <div class="row">
                  <label class="col s4 m3"
                    ><i class="material-icons red-text">location_on</i>
                    Livraison
                  </label>
                  298 Paul, 66000 Perpignan
                </div>
              </div>
            </div>

            <div class="card-action">
              <a class="btn" href="/missions/1">Afficher</a>

              <a class="btn orange" href="/missions/1/edit">Editer</a>

              <a class="btn purple darken-2" href="/missions/1/duplicate"
                >Dupliquer</a
              >
            </div>
          </div>
        </div>
      </div>

      <div class="navigation"></div>
      <ul>
        <li></li>
      </ul>
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
      document.addEventListener("DOMContentLoaded", function () {
        App.initFormMissionFilter();
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