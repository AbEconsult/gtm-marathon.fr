<?php
/**
 * Summary of connexion
 * @return mixed
 */
function connexion()
{
    $Param = parse_ini_file("param/marathon.ini", true);
    extract($Param["BDD"]);
    $dsn = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . "; charset=utf8";
    echo "<br> (4) je suis connecté";
    // try {
        
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $mysql = new PDO($dsn, $user, $password, $options);
        echo "<br> (2) je suis dans  - modeles/modele.inc - pour la 1ère fois et j'ai une erreur";
        
        return $mysql;
     
    // } catch (Exception $e) {
    //     // en cas erreur on affiche un message et on arrete tout
    //     die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
    // }
}

/**
 * Contrôle si l'utilisateur entré dans le formulaire de connexion est dans la base de données
 * et retourne un tableau si c'est le cas avec le nom, prénom, email et profil
 * @param string $mail L'email de l'utilisateur qui sert d'identifiant
 * @return array 
 */
function getConnexion(string $mail) {
    $mysql = connexion();
    
    $sql = "SELECT username,u.email, pwd, roles FROM user u 
                INNER JOIN profil p ON u.email = p.email 
            WHERE u.email = :mail";
    $recupUser = $mysql->prepare($sql);

    $recupUser->execute([":mail" => $mail]);

    $tUsers = $recupUser->fetchAll(PDO::FETCH_ASSOC);
    var_dump($tUsers);

    $recupUser->closeCursor();
    $mysql = null;

    return $tUsers;
}

?>
