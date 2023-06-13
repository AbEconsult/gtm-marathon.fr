<?php
if(!isset($_SESSION)){
    session_start();
}
ob_start();
?>
<h1>Accueil - Gestion des Missions1</h1>';
<?
$contenu = ob_get_clean();

require_once("vue/view_header.php");
require_once('vue/modele.php');

?>
