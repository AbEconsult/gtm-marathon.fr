<?php


if (!isset($_SESSION)) {

  session_start();
}

$tUsers = getListUsers();
$contenu = "";

//  ob_start();

// require("controllers/controlUsers.php");
// echo"<br> je repars dans controlUsers depuis moderateurs";
// echo "<br> controlUsers-2 b:la valeur de tUsers = ".count($resultatR);
// $tUsers=list_User('nom','email','roles');
// list_User($nom,$email,$roles);
// print_r($resultatR);

// $contenu = "<table class='striped'>"
//   . "<thead>"
//   . " <tr>"
//   . " <th>Id</th>"
//   . " <th>Nom</th>"
//   . "  <th>Prénom</th>"
//   . "  <th>Email</th>"
//   . "  <th>Profil</th>"
//   . "  <th>Actions</th>"
//   . "</tr>"
//   . "</thead>"."";

$contenu="<form action ='modifier-user' method='post'>
<table id='tableauTicket' style='width:98%'>
<thead class='titreTableau'>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Profil</th>
        <th>Actions</th>
    </tr>
</thead>"."";
foreach ($tUsers as $users) {
  if ($users['roles'] === 'moderator') {
      // . "<tbody>"
      // . "<Nom>".$users['id']
      $contenu .= "<table class='striped text-align:right' id='corpsTableau'>
      <tr>
            <td>".$users['id']."</td>
            <td>".$users['user_firstname']."</td>
            <td>".$users['user_lastname']."</td>
            <td>".$users['email']."</td>
            <td>".$users['roles']."</td>
            <td>" . "<form action='modifier-user' method='post'>
            <input type='hidden' name ='idUser' value ='".$users["id"]."'>
            <input class='btn orange' type='submit' value='modifier'>
          </br>
          </form>"
      . "<td>" 
      . "<form action='suprimer-user' method='post'></br>"
      . "<input class='btn red' type='submit' name='action' value='supprimer'></br>" . "</form>"
      . "<br>"
      // . '<td> <Nom> Id :' . $users['id'] . '</td>'
      // . '<td> </br>Nom : ' . $users['user_firstname'] . '</td>'
      // . '<td> </br>Nom : ' . $users['user_lastname'] . '</td>'
      . '<button class="btn red disableProfile" type="submit" value ="Désactiver" style="display" profileid="7">Désactiver</button>'
      . '<button class="btn green enableProfile" type="submit" value ="Réactiver" style="display:none" profileid="7">Réactiver</button>'
      . '</td>'
      . '</tr>'
      // . '<hr>'
      . '<tr>'
      . '</tbody>'
      // . '<input type="hidden" name="id" value="' . $users['id'] . '"/></br>'
      // . '</form>'
      . '</main>'
//       . '<script type="text/javascript">
// document.addEventListener("DOMContentLoaded", function() {
//     window.onerror = function(error) {
//       //alert(JSON.stringify(error));
//     };
//     App.init();

//     document.querySelectorAll("form").forEach(function(item) {
//       item.setAttribute("autocomplete", "off");
//     });
//   });
//   </script>
  
  // <script type="text/javascript">
  // document.addEventListener("DOMContentLoaded", function() {});
  // </script>
  
.'<div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <div id="sp-notification-wrapper" style="
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
      "></div>
      </body>
      
      </html>';
      // $contenu = ob_get_clean();
    }
  }
  require_once('vue/view_header.php');
  // echo $contenu;      
  require_once('vue/modele.php');
  // var_dump($users['id']);
