<?php
require_once("modeles/modele.inc.users.php");

$action = 'accueil';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}


    switch ($action) {
        case 'list_Users':
    echo "<br>controlUsers-1 : je passe par défaut la list des users car action=list_users";
            // 1 - récupérer la liste des utilisateurs
    echo "<br>controlUsers-2 : je récupère la list des users car action=list_users et je vais dans view_listUsers dans modele_user";
            $tUsers = listUsers($email);
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
            $nom = strtoupper($_POST['username']);
            $prenom = ucfirst(strtolower($_POST['prenom']));
            $roles = $_POST['roles'];
            $email = strtolower($prenom.'.'.$nom.'@gtm-marathon.fr');
            $pwd = password_hash($_POST ['pwd'], PASSWORD_DEFAULT);
    
            // 2 - Enregistrer le nouveau client dans la BDD
            $resultat = insUser($nom,$prenom,$roles,$email,$pwd);
    
            // 3 - Afficher le résultat à l'utilisateur
            $titre = "Ajout d'un utilisateur";
            $verbe = "ajouté";
            require_once("Vue/view_resultatUser.php");      
            break;
        
        case 'listUsers':
            // 1 - Afficher un formulaire
            $titre = "Rechercher un utilisateur";
            $tUsers = listUsers($email);
            require_once("Vue/view_formUser.php");
            break;
    
        case 'MAJlistUsers':
            // 1 - Récupérer les données de la recherche
            $nom = strtoupper($_POST['username']);
            $prenom = ucfirst(strtolower($_POST['prenom']));
            $roles = $_POST['roles'];
            $email = strtolower($_POST['email']);
    
            // 2 - Rechercher les utilisateurs correspondants dans la BDD
            $tUsers = addUser($nom, $prenom,$roles,$email,$pwd);
    
            // 3 - Afficher les utilisateurs correspondants
            $titre = "Liste des utilisateurs trouvés :";
            require_once("Vue/view_listUsers.php");
            break;
    
        case 'supprimer':
            // 1 - Récupérer l'identifiant de l'utilisateur
            $id_user = $_POST['id'];
            $id_service = $_POST['roles'];
    
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
            $user = updUser($id_user);
        
            // afficher le formulaire prérempli
            $titre = "Modifier un utilisateur";
            require("Vue/view_formModif.php");    
            break;
        
        case 'MAJmodifier':
            // 1 - Récupérer l'identifiant du client
            $id_user = $_POST['id_user'];
                    
            // 2 - Modifier le client dans la BDD
            $user = ["id_user" => $id_user, "nom" => $_POST['username'], "prenom" => $_POST['prenom'], 
                        "pwd" => password_hash($_POST ['pwd'], PASSWORD_DEFAULT), "roles"=> $_POST['roles']];
        
            $resultat = MajupdUser($user);
        
            // 3 - Afficher le résultat à l'utilisateur
            $titre = "Modification d'un utilisateur";
            $verbe = "modifié";
    
            require("Vue/view_resultatUser.php");    
            break;
    }
?>


