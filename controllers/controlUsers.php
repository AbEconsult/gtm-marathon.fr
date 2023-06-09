<?php
require_once("modeles/modele.inc.php");

if ($controUsers === 0){
    $controUsers=1;
}else {
    $controUsers++;
}
echo "<br> passage controlUsers = ".$controUsers;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
echo "<br> 11.d) 1er passage dans controlUsers, la valeur de action = $action";
// $tb_users="";
switch ($action) {
    case 'list_Users':
echo "<br>controlUsers-1 : je passe par défaut la list des users car action=list_users";
        // 1 - récupérer la liste des utilisateurs
echo "<br>controlUsers-2 : je récupère la list des users car action=list_users et je vais dans view_listUsers dans modele_user";
        $tb_users = listUsers();
        // 2 - afficher la liste des utilisateurs
        $titre = "Utilisateurs";
echo "<br> 4ème passage";
echo "<br> controlUsers-3 : je reviens de model_user et repasse par là après avoir lancé la fonction list_Users et part dans la view_listUsers";

        require_once("Vue/view_listUsers.php");
        break;

    case 'ajoutUser':
        // 1 - Afficher un formulaire
        $titre = "Ajouter un utilisateur";
        require_once("Vue/view_formUser.php");
        break;

    case 'MAJajoutUser':
        $nom = strtoupper($_POST['nom']);
        $prenom = ucfirst(strtolower($_POST['prenom']));
        $service = $_POST['service'];
        $email = strtolower($prenom.'.'.$nom.'@belcom.com');
        $mdp = password_hash($_POST ['mdp'], PASSWORD_DEFAULT);

        // 2 - Enregistrer le nouveau client dans la BDD
        $resultat = insUser($nom,$prenom,$service,$email,$mdp);

        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Ajout d'un utilisateur";
        $verbe = "ajouté";
        require_once("Vue/view_resultatUser.php");      
        break;
    
    case 'list_User':
        // 1 - Afficher un formulaire
        $titre = "Rechercher un utilisateur";
        $tb_users = listUsers();
        require_once("Vue/view_formUser.php");
        break;

    case 'MAJlistUsers':
        // 1 - Récupérer les données de la recherche
        $nom = strtoupper($_POST['nom']);
        $prenom = ucfirst(strtolower($_POST['prenom']));
        $service = $_POST['service'];
        $email = strtolower($_POST['email']);

        // 2 - Rechercher les utilisateurs correspondants dans la BDD
        $tb_users = ajoutUser($nom, $prenom,$service,$email,$mdp);

        // 3 - Afficher les utilisateurs correspondants
        $titre = "Liste des utilisateurs trouvés :";
        require_once("Vue/view_listUsers.php");
        break;

    case 'supprimer':
        // 1 - Récupérer l'identifiant de l'utilisateur
        $id_user = $_POST['id_user'];
        $id_service = $_POST['id_service'];

        // 2 - Supprimer le client dans la BDD
        $resultat = delUser($id_user, $id_service);

        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Suppression d'un utilisateur";
        $verbe = "supprimé";
        require_once("Vue/view_resultatUser.php");    
        break;
        
    case 'modifier':
        // 1 - Récupérer l'identifiant du client
        $id_user = $_POST['id_user'];
                
        // 2 - Récupérer les infos du client
        $user = UserById($id_user);
    
        // afficher le formulaire prérempli
        $titre = "Modifier un utilisateur";
        require("Vue/view_formModif.php");    
        break;
    
    case 'MAJmodifier':
        // 1 - Récupérer l'identifiant du client
        $id_user = $_POST['id_user'];
                
        // 2 - Modifier le client dans la BDD
        $user = ["id_user" => $id_user, "nom" => $_POST['nom'], "prenom" => $_POST['prenom'], 
                    "mdp" => password_hash($_POST ['mdp'], PASSWORD_DEFAULT), "service"=> $_POST['service']];
    
        $resultat = majUser($user);
    
        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Modification d'un utilisateur";
        $verbe = "modifié";

        require("Vue/view_resultatUser.php");    
        break;
}
?>


