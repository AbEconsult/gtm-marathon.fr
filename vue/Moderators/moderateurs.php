<?php
echo "<br> (2) - Je passe dans 'moderateurs'";
$contenu = '
<main class="container">
      <h3>Les moderateurs</h3>
      <a
        class="btn-floating btn-large waves-effect waves-light red right"
        href="/vue/Moderators/new"
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
            <td>1</td>
            <td>Abel</td>
            <td>ElAbjani</td>
            <td>
              <a class="btn orange" href="/vue/Moderators/1/edit">Modifier</a>

              <button class="btn red disableProfile" profileid="1">
                Désactiver
              </button>
              <button
                class="btn green enableProfile"
                style="display: none"
                profileid="1"
              >
                Réactiver
              </button>
            </td>
          </tr>
          <tr>
            <td>7</td>
            <td>Fevrier</td>
            <td>Eric</td>
            <td>
              <button
                class="btn red disableProfile"
                style="display: none"
                profileid="7"
              >
                Désactiver
              </button>
              <button class="btn green enableProfile" profileid="7">
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
  </body>
</html>';
require "vue/modele.php";
