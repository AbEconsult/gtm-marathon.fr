<?php


$action = "accueil";
$contenu_alert = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
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
}
