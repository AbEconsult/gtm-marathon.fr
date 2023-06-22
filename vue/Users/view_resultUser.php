<?php 

if ($res === true) {
    $contenu = "<h2>Votre utilisateur a bien été $verbe</h2>";    
} else {
    $contenu = "<h2>Votre utilisateur n'a pas été $verbe.</h2>";
}
    
require_once("vue/view_header.php");
require_once('modele.php');
?>