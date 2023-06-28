<?php
// echo "<br> 03 ) je suis dans controlUsers et je vais dans modele.inc.users";
// je charge les fonctions de modele.ic.users 
require_once("modeles/modele.inc.users.php");
// echo "<br> 03 a) je suis dans controlUsers et passe dans modele.inc.users ";
$action = 'accueil';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
if (!empty($_POST['action'])) {
    $action = $_POST['action'];
}
$nom_user = "";
$email_user = "";
$roles = "";

// echo "<br> 03 a) la valeur de action dans controlUsers = " . $action;


switch ($action) {

    case 'accueil':
        // echo "<br>accueil-1 : je passe par défaut la list des users car action = ".$action;
        // 1 - récupérer la liste des utilisateurs
        // echo "<br>accueil-2 : je récupère la list des users car action=accueil et je vais dans view_accueil *";
        // $tUsers = getlistUsers();
        // echo "<br>controlUsers-2 a:la valeur de tUsers = " . count($tUsers);
        // echo "<br>controlUsers-2 b:la valeur tableau de tUsers = " . print_r($tUsers);
        // 2 - afficher la liste des utilisateurs
        $titre = "accueil";
        $contenu="";
        // echo "<br> 4ème passage";
        
        // require_once("vue/view_listUsers.php");
    
        require_once("vue/view_accueil.php");
        // echo "<br> accueil-3 : je reviens de view_accueil et repasse par control_users ";
        // require_once("vue/view_header.php");
        break;
    case 'list_Users':
        echo "<br>controlUsers-1 : je passe par défaut la list des users car action=list_users";
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
        $nom_user = strtoupper($_POST['user_firstname']);
        $prenom_user = ucfirst(strtolower($_POST['user_lastname']));
        $roles = $_POST['roles'];
        $email_user = strtolower($prenom_user . '.' . $nom_user . '@gtm-marathon.fr');
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        // 2 - Enregistrer le nouveau user dans la BDD
        $resultat = insUser($nom_user, $prenom_user, $roles, $email_user, $pwd);

        // 3 - Afficher le résultat à l'utilisateur
        $titre = "Ajout d'un utilisateur";
        $verbe = "ajouté";
        require_once("Vue/view_resultatUser.php");
        break;

    case 'searchUsers':
        // 1 - Afficher un formulaire

        // require_once("modeles/modele.inc.users.php");

        // print_r($ResultatR);

        $titre = "Rechercher un utilisateur";
        searchUsers($nom_user,$email_user,$roles);
        // var_dump($tUsers);

        // echo "<br>controlUsers-2 a: je récupère la list des users car action=searchUsers et je vais dans moderateurs et tUsers = ";
        require_once("vue/Moderators/moderateurs.php");
        break;

    case 'MAJsearchUsers':
        // 1 - Récupérer les données de la recherche
        $nom_user = strtoupper($_POST['user_firstname']);
        $prenom_user = ucfirst(strtolower($_POST['user_lastname']));
        $roles = $_POST['roles'];
        $email_user = strtolower($_POST['email']);

        // 2 - Rechercher les utilisateurs correspondants dans la BDD
        $tUsers = addUser($nom_user, $prenom_user, $roles, $email_user, $pwd);

        // 3 - Afficher les utilisateurs correspondants
        $titre = "Liste des utilisateurs trouvés :";
        require_once("Vue/view_listUsers.php");
        break;

        case 'searchMod':
            // 1 - Afficher un formulaire
    
            require_once("modeles/modele.inc.users.php");
            $titre = "Rechercher un utilisateur";

            // echo "<br>controlUsers-2 a: je récupère la list des users car action=searchMod et je vais dans moderateurs et tUsers = ".$tModes;
            require_once("vue/Moderators/moderateurs.php");
            break;
    
        case 'MAJsearchMod':
            // 1 - Récupérer les données de la recherche
            $nom_user = strtoupper($_POST['user_firstname']);
            $prenom_user = ucfirst(strtolower($_POST['user_lastname']));
            $roles = $_POST['roles'];
            $email_user = strtolower($_POST['email']);
    
            // 2 - Rechercher les utilisateurs correspondants dans la BDD
            $tUsers = addUser($nom_user, $prenom_user, $roles, $email_user, $pwd);
    
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

    case 'modifierUsers':
        // 1 - Récupérer l'identifiant du user
        $id_user=$_POST['idUser'];
        echo " <br> 03 b) le numéro d'ID selectionné est le = " . $id_user;

        // 2 - Récupérer les infos du user

        $user=getUserById($id_user);
        // var_dump($users);

        // afficher le formulaire prérempli
        $titre = "Modifier un utilisateur";
        require("vue/Users/view_modifUsers.php");
        break;

    case 'MAJmodifierUsers':
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
