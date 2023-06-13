<?php
echo "<br> (2) - Je passe dans Clients";
if (!isset($_SESSION)) {
  echo "<br> (2a) je test si la session est toujours active dans - clients - et passe pour la 1ère fois ";
  echo "<br> (2b) je passe dans clients - pour la 1ère fois ";
  session_start();
}

ob_start();

?>
  <body>
    <main class="container">
      <h3>Listes des clients</h3>
      <a
        class="btn-floating btn-large waves-effect waves-light red right"
        href="/vue/Customerss/new"
      >
        <i class="material-icons">add</i></a
      >

      <div class="row">
        <form name="Customers_filter" method="post" autocomplete="off">
          <div class="col m2">
            <div>
              <label for="Customers_filter_name"> Nom </label
              ><input
                type="text"
                id="Customers_filter_name"
                name="Customers_filter[name]"
              />
            </div>
          </div>
          <div class="col m2">
            <div>
              <label for="Customers_filter_locality"> Ville </label
              ><input
                type="text"
                id="Customers_filter_locality"
                name="Customers_filter[locality]"
              />
            </div>
          </div>
          <div class="col m2">
            <div>
              <label for="Customers_filter_postalCode"> Code postal </label
              ><input
                type="text"
                id="Customers_filter_postalCode"
                name="Customers_filter[postalCode]"
              />
            </div>
          </div>
          <div class="col m2">
            <div>
              <label for="Customers_filter_tel"> Numéro de téléphone </label
              ><input
                type="text"
                id="Customers_filter_tel"
                name="Customers_filter[tel]"
              />
            </div>
          </div>
          <div class="col m2">
            <div>
              <label for="Customers_filter_email"> E-mail de facturation </label
              ><input
                type="text"
                id="Customers_filter_email"
                name="Customers_filter[email]"
              />
            </div>
          </div>

          <input class="btn" type="submit" value="Filtrer" />
          <input
            type="hidden"
            id="Customers_filter__token"
            name="Customers_filter[_token]"
            value="CfkMdV1TOMcIbrHis13koq0GtDzVHsUTTN2VYKz6jOc"
          />
        </form>
      </div>

      <table class="striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>E-mail de facturation</th>
            <th>Fax</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="/vue/Customers/3">3</a></td>
            <td>MARATHON</td>
            <td>Rue de l\'église, 1, 94000 RUNGIS</td>
            <td>014949494949</td>
            <td>commercial@marathon-str.fr</td>
            <td></td>
            <td>
              <a class="btn orange" href="/vue/Customers/3/edit">Modifier</a>

              <button class="btn red disableProfile" profileid="3">
                Désactiver
              </button>
              <button
                class="btn green enableProfile"
                style="display: none"
                profileid="3"
              >
                Réactiver
              </button>
            </td>
          </tr>
          <tr>
            <td><a href="/vue/Customers/6">6</a></td>
            <td>GTM</td>
            <td>rue de la Paix, 26, 02200 SOISSONS</td>
            <td></td>
            <td>hotline@marathon-str.fr</td>
            <td></td>
            <td>
              <a class="btn orange" href="/vue/Customers/6/edit">Modifier</a>

              <button class="btn red disableProfile" profileid="6">
                Désactiver
              </button>
              <button
                class="btn green enableProfile"
                style="display: none"
                profileid="6"
              >
                Réactiver
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="navigation"></div>
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
    <div id="sp-notification-wrapper"></div>
  </body>
</html>';
<?
$menu = ob_get_clean();

require_once('vue/view_header.php');
require_once('vue/modele.php');
