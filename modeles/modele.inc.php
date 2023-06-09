<?php
function connexion()
{
    $Param = parse_ini_file("param/marathon.ini", true);
    extract($Param["BDD"]);
    $dsn = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . "; charset=utf8";

    try {
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $mysql = new PDO($dsn, $user, $password, $options);

        $sql = "SELECT * FROM user";

        $reponse = $mysql->query($sql);

        $resultats = $reponse->fetchAll();

        $reponse->closeCursor();
        
        var_dump($resultats);
        
        return $resultats;
     
    } catch (Exception $e) {
        // en cas erreur on affiche un message et on arrete tout
        die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
    }
}

?>
