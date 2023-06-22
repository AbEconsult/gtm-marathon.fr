<?php
require_once("modeles/modele.inc.php");
echo "<br> (01) je suis dans - modele.inc.users - et passe pour la 1ère fois";
// function listUsers ($email)
// {
//     echo "<br> je passe dans function listUsers - modeles/modele.inc.users.php - pour la 1ère fois ";
//     {

//         $mysql = connexion();
    
//         $sql = ("SELECT * FROM user  WHERE email=?");
    
//         $resultatsM = $mysql->prepare($sql);
    
//         $resultatsM->execute([$email]);
    
//         $tUsers = $resultatsM->fetch(PDO::FETCH_ASSOC);
    
//         return $tUsers;
//     }
// }


/**
 * Summary of connectUser
 * @param mixed $email
 * @return array
 */
function connectUser ($email)
{
    echo "<br> je passe dans function searchId - modeles/modele.inc.users.php - pour la 1ère fois ";
    {

        $mysql = connexion();
    
        $sql = ("SELECT * FROM user  WHERE email=?");
    
        $resultatsM = $mysql->prepare($sql);
    
        $resultatsM->execute([$email]);
    
        $users = $resultatsM->fetch(PDO::FETCH_ASSOC);
    
        return $users;
    }
}
function getListUsers(){
    echo "<br> 05) je passe dans getListUsers de modele.inc.users"; 
    $connexion=connexion();

    //prepare la requête SQL
    $sql = "SELECT id,user_firstname,user_lastname,email,roles
            FROM user ORDER BY id";
    //execute la requete
    $curseur=$connexion->query($sql);

    //recupere
    $record=$curseur->fetchAll();

    //ferme le curseur
    $curseur->closeCursor();

    //detruit la connexion
    $connexion = null;

    // retourn le tableau

    return $record;
}

function addUser(string $nom, string $prenom, int $profil, string $email, string $mdp) {
    $connexion = connexion();

    // Préparer la requête SQL
    $sql1="SELECT email FROM user WHERE email = :email";
    $sql2 = "INSERT INTO user (user_firstname, user_lastname, roles, email, mdp) VALUES (?,?,?,?,?)";

    //Enregistre la requête 1
    $request = $connexion->prepare($sql1);

    //Exécute la requête 1
    $request->execute(array('email'=>$email));
    $count = $request->rowCount();

    if($count){
        echo'<script>','alert("Cet user existe déjà !")','</script>';
    } else {
        //Enregistre la requête 2
        $curseur = $connexion->prepare($sql2);

        //Exécute la requête 2
        try {
            $res = $curseur->execute([$nom,$prenom,$profil,$email,$mdp]);

        }catch(PDOException $e){
            $res = false;
        }
    
    // Fermer le curseur / resultset
    $curseur->closeCursor();

    // Détruit la connexion
    $connexion = null;

    // Retourner un booléen (VRAI si insertion réussie)
    return $res;
    }
}

function list_User(string $nom,string $email,int $profil) {
    $mysql = connexion();

    // Préparer la requête SQL
    if ($profil!=""){
        $sql = "SELECT u.id,u.user_lastname,u.email,u.roles,p.discr
                FROM user u
                JOIN profil p ON u.roles=p.roles
                WHERE user_lastname LIKE :nom AND email LIKE :email AND u.roles = :roles;";}
    else {
        $sql = "SELECT u.id,u.user_lastname,u.email,u.roles,p.roles
                FROM user u
                JOIN profil p ON u.roles=p.roles
                WHERE user_lastname LIKE :nom AND email LIKE :email";}
        

    // Enregistre la requête préparée
    $curseur = $mysql->prepare($sql);

    //Exécute la requête
    if ($profil!=0){
        $curseur->execute([":nom"=>"%$nom%",":email"=>"%$email%",":profil"=>$profil]);}
    else {
        $curseur->execute([":nom"=>"%$nom%",":email"=>"%$email%"]);}
    

    // Récupérer les enregistrements
    $tUsers = $curseur->fetchAll(PDO::FETCH_ASSOC);
    print_r($tUsers);
    return $tUsers;
}

/**
 * Renvoi le nombre d'administrateur dans la bdd
 * @return int
 */
function countAdmin() {
    $connexion = connexion();

    $sql = "SELECT * FROM user WHERE roles = 'admin'";
    $curseur = $connexion->query($sql);
    $nbAdmin = $curseur->rowCount();

    $curseur->closeCursor();
    $connexion = null;

    return $nbAdmin;
}

function delUser(int $idUser, int $idProfil) {
    $connexion = connexion();

    $nbAdmin = countAdmin();

    try{
        // Préparer la requête SQL pour vérifier que l'user ne travaille pas déjà sur un ticket
        $sql="SELECT u.id FROM user u JOIN mission m ON m.id=u.id WHERE u.id = ?";

        // Enregistrer la requête préparée
        $curseur = $connexion->prepare($sql);

        // Récupérer le nombre d enregistrements
        $nbUsers = $curseur->rowCount();

            if ($nbUsers>=1){

                // Fermer le curseur / resultset
                $curseur->closeCursor();

                // Détruit la connexion
                $connexion = null;

                $res = false;

                // Retourner un booléen (VRAI si 1 seul contact supprimé)
                return $res;

            }else {
                // Préparer la requête SQL
                $sql = "DELETE FROM user WHERE id = ?";

                // Enregistrer la requête préparée
                $curseur = $connexion->prepare($sql);

                if ($idProfil === 'admin' AND $nbAdmin < 2) {
                    // Fermer le curseur / resultset
                    $curseur->closeCursor();
    
                    // Détruit la connexion
                    $connexion = null;
    
                    $res = false;
    
                    // Retourner un booléen (VRAI si 1 seul contact supprimé)
                    return $res;
                }
                // Exécuter la requête
                $curseur->execute([$idUser]);

                // Récupérer le nombre d enregistrements supprimés
                $nbUsers = $curseur->rowCount();

                // Fermer le curseur / resultset
                $curseur->closeCursor();

                // Détruit la connexion
                $connexion = null;

                // Retourner un booléen (VRAI si 1 seul contact supprimé)
                return ($nbUsers === 1);
            }
        }catch(PDOException $e){
        return $res=false;
    }
}

function getUserById(int $idUser) {
    $connexion = connexion();

    // Préparer la requête SQL
    $sql = "SELECT * FROM user WHERE id = ?";

    // Enregistrer la requête préparée
    $curseur = $connexion->prepare($sql);

    // Exécuter la requête
    $curseur->execute([$idUser]);

    // Récupérer les enregistrements
    $user = $curseur->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function updUser(array $user) {
    $connexion = connexion();
    
    // Préparer la requête SQL
    $sql = "UPDATE user SET user_firstname = :nom, user_lastname = :prenom, mdp = :mdp, roles = :profil WHERE id = :idUser";
    
    // Enregistrer la requête préparée
    $curseur = $connexion->prepare($sql);
    
    // Exécuter la requête
    $curseur->execute(["idUser" => $user['id'], ":nom"=> $user['user_firstname'], 
    ":prenom"=> $user['user_lastname'], ":mdp"=> $user['mdp'], ":profil"=> $user['profil']]);
    
    // Récupérer le nombre d'enregistrements supprimés
    $nbUsers = $curseur->rowCount();
    
    // Fermer le curseur / resultset
    $curseur->closeCursor();
    
    // Détruit la connexion
    $connexion = null;
    
    // Retourner un booléen (VRAI si 1 seul contact modifié)
    return ($nbUsers === 1);
}
?>