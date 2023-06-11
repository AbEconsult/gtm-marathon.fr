<?php
require_once "login.php";
echo "<br> (2) je passe dans index - pour la 1ère fois et vais dans controlConnexion ";
require_once("controllers/controlConnexion.php");
// echo "<br> (6) je repasse dans index - pour la 2ème fois et vais dans login et la valeur de action = " . $action . ", et email = " . $_SESSION['email'] . " et roles =" . 'roles= ' . $_SESSION['roles'];
echo "<br> (6) je repasse dans index - pour la 2ème fois et vais dans login et la valeur de action = " . $action;

if (!isset($_SESSION['email'])) {
    echo "<br> 7) je passe dans le test de contenu de la variable email si non vide dans index pour la 1ère fois, donc elle est vide et je ne suis pas identifié ";
    // echo "<br> 8) je pars dans le - controller/controlConnexion - pour la 1ère fois ";
    // echo "<br> 9) index - après le test ";
    // echo $index;
    // require_once("vue/view_connexion.php");

    // echo "<br> 10) je reviens de - controller/controlConnexion - pour la 1ère fois et lance - controllers/controlConnexion";
    require_once("controllers/controlConnexion.php");
} else {
    // echo "<br> 10.a) je suis dans index et la valeur de us_id_serv =  " . $_SESSION['roles'];
    if ($_SESSION['roles'] === 'admin') {
        echo "<br> 10.b) je passe le test dans index roles=admin et la valeur de roles =  " . $_SESSION['roles'] . " et je pars dans controlUsers";
        $action = "accueil";
    } elseif ($_SESSION['roles'] === 'moderator' or $_SESSION['roles'] === "driver") {
        echo "<br> 10.b) je passe le test dans index roles =admin ou user et la valeur de us_id_serv =  " . $_SESSION['roles'] . "et je pars dans controlTickets";
        echo "<br> je suis dans index et le test roles = $_SESSION(['roles'])";
        $action = "accueil";

        // require_once("controllers/controlTickets.php");
    } else {
        echo "<br> je suis dans index et ne passe ni dans controlConnexion ni dans id_service qui n'existe pas ";
        $action = "accueil";
        $contenu_alert = "";

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
    }
}
switch ($action) {
    case "accueil":
        echo "(1) - Je passe par l'action 'accueil' de l'index";
        require "vue/view_accueil.php";
        break;
    case "moderateur":
        echo "(1) - Je passe par l'action 'moderateurs' de l'index";
        $titre = "Gestion des Moderateurs";
        require "vue/modele.php";
        require "vue/Moderators/moderateurs.php";
        break;
    case "conducteur":
        echo "(1) - Je passe par l'action 'conducteurs' de l'index";
        $titre = "Gestion des Conducteurs";
        require "vue/modele.php";
        require "vue/Drivers/conducteurs.php";
        break;
    case "client":
        echo "(1) - Je passe par l'action 'clients' de l'index";
        $titre = "Gestion des Clients";
        require "vue/modele.php";
        require "vue/Customers/clients.php";
        break;
    case "mission":
        echo "(1) - Je passe par l'action 'missions' de l'index";
        $titre = "Gestion des Missions";
        require "vue/modele.php";
        require "vue/Missions/missions.php";
        break;
    case "logout":
        echo "(1) - Je passe par l'action 'deconnecter' de l'index";
        $titre = "Gestion des Missions";
        require "logout.php";
        // require "vue/Missions/missions.php";
        break;
}



        // case "list":
        //     require "modeles/modele.inc.php";
        //     $tList = getListContacts();
        //     require "Vue/view_listeContacts.php";
        //     break;
        // case "insert":
        //     $titre = "Ajouter un contact";
        //     require "Vue/view_formCreatContact.php";
        //     break;
        // case "addContactMAJ":
        //     $nom = $_GET['nom'];
        //     $prenom = $_GET['prenom'];
        //     $phone = $_GET['phone'];
        //     require "modeles/modele.inc.php";
        //     $resultatsI = inserer($nom, $prenom, $phone);    
        //     require "Vue/view_accueil.php";
        //     break;
        // case "search":
        //     $titre = "Rechercher un Contact";
        //     require "Vue/view_formulaire.php";
        //     break;
        // case "rechercher":
        //     $nom = $_GET['nom'];
        //     $prenom = $_GET['prenom'];
        //     $phone = $_GET['phone'];
        //     require "modeles/modele.inc.php";
        //     $tList = search($nom, $prenom, $phone);

        //     require "Vue/view_listeContacts.php";

        //     break;
        // case "update":
        //     $titre = "Modifier un Contact";
        //     require "modeles/modele.inc.php";
        //     $id = $_GET['id'];
        //     $contact = searchId($id);
        //     require "Vue/view_formUpdContact.php";
        //     break;
        // case "updContact":
        //     require "modeles/modele.inc.php";
        //     $id = $_GET['id'];
        //     $contact = [
        //         "id_contact" => $id,
        //         "nom_contact" => $_GET['nom'],
        //         "prenom_contact" => $_GET['prenom'],
        //         "phone_contact" => $_GET['phone']
        //     ];
        //     $resultatsM = updContact($contact);
        //     require "Vue/view_accueil.php";
        //     break;

        // case "delete":
        //     require "modeles/modele.inc.php";
        //     $id = $_GET['id'];


        //     $resultatsD = delContact($id);

        //     require "Vue/view_accueil.php";
        //     break;
// }
