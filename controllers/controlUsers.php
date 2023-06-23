<?php
// je charge les fonctions de modele.ic.users 
require_once("modeles/modele.inc.users.php");
// echo "<br> 03 ) je passe dans modele.in.users ";
$action = 'accueil';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
if (!empty($_POST['action'])) {
    $action = $_POST['action'];
}

// echo "<br> 03 a) la valeur de action dans controlUsers = " . $action;
// var_dump($_POST['action']);

switch ($action) {

    case 'accueil':
        // echo "<br>accueil-1 : je passe par défaut la list des users car action=accueil";
        // 1 - récupérer la liste des utilisateurs
        // echo "<br>accueil-2 : je récupère la list des users car action=accueil et je vais dans view_accueil *";
        // $tUsers = getlistUsers();
        // echo "<br>controlUsers-2 a:la valeur de tUsers = " . count($tUsers);
        // echo "<br>controlUsers-2 b:la valeur tableau de tUsers = " . print_r($tUsers);
        // 2 - afficher la liste des utilisateurs
        $titre = "accueil";
        // $contenu="";
        // echo "<br> 4ème passage";
        
        // require_once("vue/view_listUsers.php");
    
        require_once("vue/view_accueil.php");
        // echo "<br> accueil-3 : je reviens de view_accueil et repasse par control_users ";
        // require_once("vue/view_header.php");
        break;
    case 'list_Users':
        // echo "<br>controlUsers-1 : je passe par défaut la list des users car action=list_users";
        // 1 - récupérer la liste des utilisateurs
        // echo "<br>controlUsers-2 : je récupère la list des users car action=list_users et je vais dans view_listUsers dans modele_user";
        $tUsers = getlistUsers();
        // echo "<br>controlUsers-2 a:la valeur de tUsers = " . count($tUsers);
        // echo "<br>controlUsers-2 b:la valeur tableau de tUsers = " . print_r($tUsers);
        // // 2 - afficher la liste des utilisateurs
        $titre = "Utilisateurs";
        // echo "<br> 4ème passage";
        // echo "<br> controlUsers-3 : je reviens de model_user et repasse par control_users après avoir lancé la fonction list_Users et part dans la view_listUsers";

        // require_once("vue/view_listUsers.php");
        require_once("vue/view_accueil.php");

        break;

    case 'ajoutUser':
        // 1 - Afficher un formulaire
        $titre = "Ajouter un utilisateur";
        require_once("Vue/view_formUser.php");
        break;

    case 'MAJajoutUser':
        $nom = strtoupper($_POST['user_firstname']);
        $prenom = ucfirst(strtolower($_POST['user_lastname']));
        $roles = $_POST['roles'];
        $email = strtolower($prenom . '.' . $nom . '@gtm-marathon.fr');
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        // 2 - Enregistrer le nouveau user dans la BDD
        $resultat = insUser($nom, $prenom, $roles, $email, $pwd);

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
        $nom = strtoupper($_POST['user_firstname']);
        $prenom = ucfirst(strtolower($_POST['user_lastname']));
        $roles = $_POST['roles'];
        $email = strtolower($_POST['email']);

        // 2 - Rechercher les utilisateurs correspondants dans la BDD
        $tUsers = addUser($nom, $prenom, $roles, $email, $pwd);

        // 3 - Afficher les utilisateurs correspondants
        $titre = "Liste des utilisateurs trouvés :";
        require_once("Vue/view_listUsers.php");
        break;

    case 'supprimer':
        // 1 - Récupérer l'identifiant de l'utilisateur
        $id_user = $_POST['id'];
        $id_profil = $_POST['roles'];

        // 2 - Supprimer le user dans la BDD
        $resultat = delUser($id_user, $id_profil);

        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Suppression d'un utilisateur";
        $verbe = "supprimé";
        require_once("Vue/view_resultatUser.php");
        break;

    case 'modifier':
        // 1 - Récupérer l'identifiant du user
        echo " <br> 03 b) le numéro d'ID selectionné est le = " . ($_POST['id']);
        $id_user = $_POST['id'];

        // 2 - Récupérer les infos du user
        $user = getUserById($id_user);
        var_dump($user);

        // afficher le formulaire prérempli
        $titre = "Modifier un utilisateur";
        require("vue/Users/view_modifUsers.php");
        break;

    case 'MAJmodifier':
        // 1 - Récupérer l'identifiant du user
        $id_user = $_POST['id'];

        // 2 - Modifier le user dans la BDD
        $user = [
            "id" => $id_user, "nom" => $_POST['user_firstname'], "prenom" => $_POST['user_lastname'],
            "pwd" => password_hash($_POST['pwd'], PASSWORD_DEFAULT), "roles" => $_POST['roles']
        ];

        $resultat = updUser($user);

        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Modification d'un utilisateur";
        $verbe = "modifié";

        require("Vue/view_resultatUser.php");
        break;
}
