<?php

if (!isset($_SESSION)) {

  session_start();
}


$titre = "Liste users";
// $contenu = "";
$contenu_alert = "";
if (!isset($UserList)) {
  echo "<br> view_listUsers-1 : je passe le contrôle du contenu de UserList dans view_list users ";
  $tlist = count($tUsers);
  // echo $tlist;
  
  // if ($view_listusers === 0){
    //     $view_listusers=1;
    // }else {
      //     $view_listusers++;
      // }
      echo "<br> view_listUsers-2 : le contenu de UserList dans view_list users = " . $tlist." enregistrements <br>";
      // require_once("modeles/modele.inc.users.php");
      // getListusers();
      
      // print_r($tUsers);
      
      // echo "<br> view_listUsers-2 a : roles = " . $_SESSION['roles'];
  if ($_SESSION['roles'] === 'admin') {
    foreach ($tUsers as $users) {
      $contenu = "<Nom> Id :" . $users['id']
        . "</br>Nom : " . $users['user_firstname']
        . "</br>Prenom : " . $users['user_lastname']
        . "</br>Email : " . $users['email']
        . "</br>Profil : " . $users['roles']
        // . "<hr>"
        . "<form action='index.php' method='post'></br>"
        . "<input type='submit' name='action' value='modifier'>"
        . "<input type='submit' name='action' value='supprimer'></br>"
        . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
        . "</form>";

      // if ($_SESSION['roles'] === 'admin') {
      // $contenu .= "<form action='index.php' method='GET'></br>"
      //     . "<input type='submit' name='action' value='modifier'>"
      //     . "<input type='submit' name='action' value='supprimer'></br>"
      //     . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
      //     . "</form>";
      // }

      // if ($tlist === 1) {
      //     $contenu .= "<form action='index.php' method='GET'></br>"
      //         . "<input type='submit' name='action' value='modifier'>"
      //         . "<input type='submit' name='action' value='supprimer'></br>"
      //         . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
      //         . "</form>";
      // } else if (count($tUsers) === 0) {
      //     $contenu_alert = "<h2> Aucun enregitrement trouvé </h2>";
      // }
      
      echo "<br> view_listUsers-4 : Je pars dans modele pour afficher = " . $contenu;
    }
  }
}


require_once('vue/view_header.php');
require_once('vue/modele.php');

