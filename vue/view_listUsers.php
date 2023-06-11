<?php
$titre = "Liste Users";
$contenu = "";
$contenu_alert = "";

if (isset($UserList)){
echo "<br> xx) je passe le contrôle du contenu de UserList dans view_listUsers ";
$tlist = count($UserList);

// if ($view_listUsers === 0){
//     $view_listUsers=1;
// }else {
//     $view_listUsers++;
// }
// echo "<br> passage dans view_listUsers= ".$view_listUsers;

foreach ($UserList as $users) {
    $contenu .= "<Nom> Id :" . $users['id']
        . "</br>Nom : " . $users['us_nom_user']
        . "</br>Prenom : " . $users['us_prenom_user']
        . "</br>Email : " . $users['us_email']
        . "</br>Profil : " . $users['roles']
        . "<hr>";
    if ($users['roles'] != 0) {
        $contenu .= "<form action='index.php' method='GET'></br>"
            . "<input type='submit' name='action' value='updateUsers'>"
            . "<input type='submit' name='action' value='deleteUsers'></br>"
            . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
            . "</form>";
    }

    if (count($UserList) === 1) {
        $contenu .= "<form action='index.php' method='GET'></br>"
            . "<input type='submit' name='action' value='updateUsers'>"
            . "<input type='submit' name='action' value='deleteUsers'></br>"
            . "<input type='hidden' name='id'value='" . $users['id'] . "'/></br>"
            . "</form>";
    } else if (count($UserList) === 0) {
        $contenu_alert = "<h2> Aucun enregitrement trouvé </h2>";
    }
}
require("vue/modele.php");
}