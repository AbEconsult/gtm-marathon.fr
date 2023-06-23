<?php
if(!isset($_SESSION)){
    session_start();
}
// ob_start();
// echo"<br> *********6 je passe dans accueil pour la 1ère fois et tUsers =".$tUsers[0];

?>
<html>
<h1>Bonjour je suis au menu accueil </h1>
<br>
<? 

// $contenu = ob_get_clean();

// foreach ($tUsers as $lUsers){
//     $contenu.=  "
//     <div class='dossier'>
//     <h2> Utilisateur n°".$tUsers['id']."</h2>
//     <div> User : ".$tUsers["user_firstname"] ." ".$tUsers["username"] ."</div>
//     <div>Adresse : ". $tUsers["user_adress"]."<br>". $tUsers["cp"]. " ". $tUsers["city"]."</div>
//     <div>Actif : ". $tUsers["enabled"]. "</div>
//     <div> Profil : ".$tUsers["roles"]."</div>
//     </div>";

//     if ($_SESSION['roles'] == "admin"){
//         $contenu.= "<form action ='supprimer' method='post' id='boutons'>
//         <input type='hidden' name = 'user' value ='".$tUsers["id"]."'>
//         <input type='submit' value='SUPRIMER' class='delBtn'>
//         </form></div>
//         <form action ='modifier' method='post' id='boutons'>
//         <input type='hidden' name = 'user' value ='".$tUsers["id"]."'>
//         <input type='submit' value='MODIFIER' class='delBtn'>
//         </form></div></td>";
//     }

// }

require_once("vue/view_header.php");
require_once('vue/modele.php');

?>
