<?php
//   echo "<br> (1) je suis dans - modele.inc - et passe pour la 1ère fois";
/**
 * Summary of connexion
 * @return mixed
 */
function connexion()
{
    $Param = parse_ini_file("param/marathon.ini", true);
    extract($Param["BDD"]);
    $dsn = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . "; charset=utf8";
    // echo "<br> (**********1) je suis connecté à la base marathon";
    try {
        
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $mysql = new PDO($dsn, $user, $password, $options);
        
        return $mysql;
        
    } catch (Exception $e) {
        // echo "<br> (**) je suis dans  - modeles/modele.inc - pour la 1ère fois et j'ai une erreur";
        // en cas erreur on affiche un message et on arrete tout
        die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
    }
}

/**
 * Contrôle si l'utilisateur entré dans le formulaire de connexion est dans la base de données
 * et retourne un tableau si c'est le cas avec le nom, prénom, email et profil
 * @param string $email L'email de l'utilisateur qui sert d'identifiant
 * @return array 
 */
function getConnexion(string $email) {
    $mysql = connexion();
    // echo "<br> (**********2) je récupère la connexion à la base marathon - dans getconnexion(email)";
    $sql = "SELECT user_lastname,u.email, pwd, u.roles, p.roles FROM user u 
                INNER JOIN profil p ON u.id = p.id 
            WHERE u.email = :email";
    $recupUser = $mysql->prepare($sql);
    $recupUser->execute([":email" => $email]);

    $tUsers = $recupUser->fetchAll(PDO::FETCH_ASSOC);

    $recupUser->closeCursor();
    // echo "<br> (**********3) je récupère la valeur de tUsers depuis la base marathon - dans getconnexion(email)";

    $mysql = null;
    
    return $tUsers;
}

/**
 * Obtient la page actuelleactuelle passée en paramètre qui passera le mot active 
 * et le placera dans le paramètre de classe pour définir la page active.
 * @param [type] $currect_page
 * @return void
 */
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active';
    } 
}
