<?php
require_once("modeles/modele.inc.tickets.php");

// $action = 'listeTickets';
$ticket = ['id_ticket'=>0, 'date_ticket'=>2023-01-01, 'us_id_user'=>0, 'id_suivi_ticket'=>0, 'id_num_com'=>0];

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
// }
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
echo "<br> 12) j'ai passé le test de la vérification de us_id_service dans controlConnexion et la valeur est égale à ".$_SESSION['us_id_service'];
echo "<br> 12.a) la valeur de action que j'ai est égale à ".$action;
switch ($action) {
    case 'listeTickets':
        // 1 - récupérer la liste des tickets
        $tbList = listTickets();
    
        // 2 - afficher la liste des tickets
        $titre = "Dossiers non finalisés";
        require("Vue/view_listTickets.php");
        break;
    case 'listTicketsUser':
        // 1 - récupérer la liste des tickets
        // $id_ticket = $_POST['id_ticket'];
        // $id_user = $_POST['us_id_user'];
        echo "<br> 13) je lance l'action searchIdTicket depuis modele.inc.tickets";
        $tbList = searchTicketUser();
    
        // 2 - afficher la liste des tickets
        $titre = "Liste de Tickets par Utilisateur";
        require("Vue/view_listTickets.php");
        break;      

    case 'detailTicket':
        $id_Ticket = $_POST['ticket'];
        
        $ticket = searchIdTicket($id_Ticket);
        //echo var_dump($id_Ticket);
        //echo var_dump($ticket);
        
        $titre = "Detail du dossier";
        require("Vue/view_detTicket.php");
        break;

    case 'delTicket':
        $id_Ticket = $_POST['ticket'];
        $idDossier = $_POST['dossier'];
        
        $resultat = delTicket($id_Ticket);
        
        $titre = "Suppression du Ticket";

        require("Vue/view_resultatTicket.php");
        break;

    case 'modifTicket':
        $id_Ticket = $_POST['ticket']; 
        $ticket = ticketById($id_Ticket);

        $titre = "Modification du ticket n°".$id_Ticket;
        require('Vue/view_modifTicket.php');
        break;

    case 'MAJmodifTicket':
        $id_Ticket = $_POST['id_ticket'];
        $ticket = ["id_ticket"=> $id_Ticket, "date_ticket"=>$_POST['date_ticket'], 
        "us_id_user"=>$_POST['us_id_user'], "id_suivi_ticket"=>$_POST['id_suivi_ticket'], "id_num_com"=>$_POST['id_num_com']];
        
        $resultat = modifTicket($id_Ticket);

        $titre ='Modification';
        $verbe = "modifié";
        require('Vue/view_resultatTicket.php');
        break;

    case 'ajoutTicket':
        // $titre = "AJOUTER UN TICKET";
        
        require('Vue/view_ajoutTicket.php');
        break;

    // case 'MAJajoutTicket':
    //     $id_Ticket = $_POST['num_ticket'];
    //     $date = $_POST['date_ticket'];
    //     $type_dossier = $_POST['type_dossier'];
    //     $idComm=$_POST['num_com'];

    //     $resultat = adTicket($id_Ticket, $date, $type_dossier, $idComm);
    //     $titre = "AJOUT D'UN TICKET";
    //     $verbe = "ajouté";
    //     require("Vue/view_resultatTicket.php");
    //     break;
}
