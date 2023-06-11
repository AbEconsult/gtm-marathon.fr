<!-- Procédures de manupuilation des données -->
<?php
$email = '';
require_once "modeles/modele.inc.php";
echo "<br> 3) je passe dans - modeles/modele.inc.users.php - pour la 1ère fois et lance connexion()";
// $modele_inc_users =" 5) modele_inc_users - "; echo $modele_inc_users;
connexion();
echo "<br> 5) j'ai lancé connexion() qui se trouve dans modele.inc et retourne sur controlConnexion ";
require_once "vue/view_listUsers.php";

// if ($modele_inc_users === 0){
//     $modele_inc_users=1;
// }else {
//     $modele_inc_users++;
// }
// echo "<br> passage dans modele.inc.users = ".$modele_inc_users;

function listUsers ($email)
{
    echo "<br> je passe dans function listUsers - modeles/modele.inc.users.php - pour la 1ère fois ";
    {

        $mysql = connexion();
    
        $sql = ("SELECT * FROM user  WHERE email=?");
    
        $resultatsM = $mysql->prepare($sql);
    
        $resultatsM->execute([$email]);
    
        $users = $resultatsM->fetch(PDO::FETCH_ASSOC);
    
        return $users;
    }
}


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

// /**
//  * Summary of insUser
//  * @param mixed $nom
//  * @param mixed $user_can
//  * @param mixed $email
//  * @param mixed $mdp
//  * @param mixed $id_service
//  * @return bool
//  */
// function insUser(string $nom, string $user_can, string $email, string $mdp, int $id_service)
// {
//     echo "<br> je passe dans function insUsers - modeles/modele.inc.users.php - pour la 1ère fois ";
//     $mysql = connexion();

//     $sql = "INSERT INTO user (username,username_canonical,email,pwd,roles) VALUES (?,?,?,?,?,?)";

//     $reponse = $mysql->prepare($sql);


//     try {
//         $resultatsI = $reponse->execute([$nom,$user_can,$email,$mdp,$id_service]);
//     } catch (PDOException $e) {
//         $resultatsI = false;
//     }

//     $reponse->closeCursor();
//     echo "<h1> Le salarié  ".$nom." à bien été crée</h1>";
//     return $resultatsI;
// }

/**
 * Summary of searchUser
 * @param mixed $nom
 * @param mixed $email
 * 
 */
function searchUser(string $nom,string $email)
{
    echo "<br> je passe dans function searchUsers - modeles/modele.inc.users.php - pour la 1ère fois ";

    $mysql = connexion();

    $sql = "SELECT * FROM user WHERE username LIKE :nom AND  email LIKE :mail ";
    var_dump($sql);

    $reponse = $mysql->prepare($sql);

    $reponse->execute([":nom" => '%' . $nom . '%', ":mail" => '%' . $email . '%']);
    $resultatsR = $reponse->fetchAll(PDO::FETCH_ASSOC);

    $reponse->closeCursor();
    $mysql=null;

    return $resultatsR;

}

// /**
//  * Summary of searchId
//  * @param mixed $id
//  * @return mixed
//  */
// function searchId(int $id)
// {
//     echo "<br> je passe dans function searchId - modeles/modele.inc.users.php - pour la 1ère fois ";
//     $mysql = connexion();

//     $sql = ("SELECT * FROM user  WHERE id=?");

//     $resultatsM = $mysql->prepare($sql);

//     $resultatsM->execute([$id]);

//     $users = $resultatsM->fetch(PDO::FETCH_ASSOC);

//     return $users;
// }

// /**
//  * Summary of updUsers
//  * @param mixed $users
//  * @return PDOStatement|bool
//  */
// function updUsers(string $users)
// {
//     echo "<br> je passe dans function updUsers - modeles/modele.inc.users.php - pour la 1ère fois ";
//     $mysql = connexion();

//     // $id=$_GET['id'];

//     $sql = "UPDATE user SET username = :nom,user_can=:user_canonical,email=:email WHERE id=:id";
//     // $sql = "UPDATE users SET nom=:nom,user_can=:user_can,phone=:phone WHERE id=:id";


//     $resultatsM = $mysql->prepare($sql);


//     $resultatsM->execute([":id" => $users['id'], ":nom" => $users['username'], ":user_can" => $users['username_canonical'], ":email" => $users['email']]);


//     $resultatsM->closeCursor();
//     echo "<h1> L'intervenant ".$users['username']." à bien été modifié</h1>";

//     return $resultatsM;
// }

// /**
//  * Summary of delUser
//  * @param mixed $id
//  * @return PDOStatement|bool
//  */
// function delUser(int $id)
// {
//     echo "<br> je passe dans function delUser - modeles/modele.inc.users.php - pour la 1ère fois ";
//     $mysql = connexion();

//     $sql = "DELETE FROM user  WHERE id=?";
    
//     $resultatsD = $mysql->prepare($sql);
    
//     $resultatsD->execute([$id]);
    
//     // echo "le nombre d'enregistrement touché est de : ".$resultatsD->rowCount();
//     echo "<br><h1>L'indentifiant N° : $id vient d'être supprimé</h1>";


//     $resultatsD->closeCursor();
    
//     return $resultatsD;
// }