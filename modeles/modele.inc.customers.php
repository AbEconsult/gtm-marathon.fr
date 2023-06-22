<?php
require_once("modeles/modele.inc.php");

function listCustomer ($nom)
{
    echo "<br> je passe dans function listcustomer - modeles/modele.inc.customer.php - pour la 1ère fois ";
    {

        $mysql = connexion();
    
        $sql = ("SELECT * FROM customer  WHERE name_customer=?");
    
        $resultatsM = $mysql->prepare($sql);
    
        $resultatsM->execute([$nom]);
    
        $customer = $resultatsM->fetch(PDO::FETCH_ASSOC);
    
        return $customer;
    }
}


/**
 * Summary of connectcustomer
 * @param mixed $nom
 * @return array
 */
function connectCustomer($nom)
{
    echo "<br> je passe dans function searchId - modeles/modele.inc.customer.php - pour la 1ère fois ";
    {

        $mysql = connexion();
    
        $sql = ("SELECT * FROM customer  WHERE name_customer=?");
    
        $resultatsM = $mysql->prepare($sql);
    
        $resultatsM->execute([$nom]);
    
        $customer = $resultatsM->fetch(PDO::FETCH_ASSOC);
    
        return $customer;
    }
}
function getListCustomer(){
    $connexion=connexion();

    //prepare la requête SQL
    $sql = "SELECT c.id_customer,c.name_customer,c.discr
            FROM customer c
	        JOIN profil p ON c.discr=p.discr
            ORDER BY id_customer";
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

function addCustomer(string $nom, int $profil) {
    $connexion = connexion();

    // Préparer la requête SQL
    $sql1="SELECT name_customer FROM customer WHERE name_customer = :nom";
    $sql2 = "INSERT INTO customer (name_customer,roles) VALUES (?,?)";

    //Enregistre la requête 1
    $request = $connexion->prepare($sql1);

    //Exécute la requête 1
    $request->execute(array('name_customer'=>$nom));
    $count = $request->rowCount();

    if($count){
        echo'<script>','alert("Ce Client existe déjà !")','</script>';
    } else {
        //Enregistre la requête 2
        $curseur = $connexion->prepare($sql2);

        //Exécute la requête 2
        try {
            $res = $curseur->execute([$nom,$profil]);

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

function listeCustomer(string $nom,int $profil) {
    $mysql = connexion();

    // Préparer la requête SQL
    if ($profil!=""){
        $sql = "SELECT c.id,c.name_customer,u.discr,p.discr
                FROM customer c
                JOIN profil p ON c.discr=p.discr
                WHERE name_customer LIKE :nom AND c.roles = :roles;";}
    else {
        $sql = "SELECT c.id,c.name_customer
                FROM customer c
                JOIN profil p ON c.discr=p.discr
                WHERE name_customer LIKE :nom";}
        

    // Enregistre la requête préparée
    $curseur = $mysql->prepare($sql);

    //Exécute la requête
    if ($profil!=0){
        $curseur->execute([":nom"=>"%$nom%",":profil"=>$profil]);}
    else {
        $curseur->execute([":nom"=>"%$nom%"]);}
    

    // Récupérer les enregistrements
    $tcustomer = $curseur->fetchAll(PDO::FETCH_ASSOC);

    return $tcustomer;
}

/**
 * Renvoi le nombre d'administrateur dans la bdd
 * @return int
 */
function countAdmin() {
    $connexion = connexion();

    $sql = "SELECT * FROM customer WHERE roles = 'admin'";
    $curseur = $connexion->query($sql);
    $nbAdmin = $curseur->rowCount();

    $curseur->closeCursor();
    $connexion = null;

    return $nbAdmin;
}

function delcustomer(int $idcustomer, int $idProfil) {
    $connexion = connexion();

    $nbAdmin = countAdmin();

    try{
        // Préparer la requête SQL pour vérifier que l'customer ne travaille pas déjà sur un ticket
        $sql="SELECT u.id FROM customer u JOIN mission m ON m.id=u.id WHERE u.id = ?";

        // Enregistrer la requête préparée
        $curseur = $connexion->prepare($sql);

        // Récupérer le nombre d enregistrements
        $nbcustomer = $curseur->rowCount();

            if ($nbcustomer>=1){

                // Fermer le curseur / resultset
                $curseur->closeCursor();

                // Détruit la connexion
                $connexion = null;

                $res = false;

                // Retourner un booléen (VRAI si 1 seul contact supprimé)
                return $res;

            }else {
                // Préparer la requête SQL
                $sql = "DELETE FROM customer WHERE id = ?";

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
                $curseur->execute([$idcustomer]);

                // Récupérer le nombre d enregistrements supprimés
                $nbcustomer = $curseur->rowCount();

                // Fermer le curseur / resultset
                $curseur->closeCursor();

                // Détruit la connexion
                $connexion = null;

                // Retourner un booléen (VRAI si 1 seul contact supprimé)
                return ($nbcustomer === 1);
            }
        }catch(PDOException $e){
        return $res=false;
    }
}

function getCustomerById(int $idcustomer) {
    $connexion = connexion();

    // Préparer la requête SQL
    $sql = "SELECT * FROM customer WHERE id_customer = ?";

    // Enregistrer la requête préparée
    $curseur = $connexion->prepare($sql);

    // Exécuter la requête
    $curseur->execute([$idcustomer]);

    // Récupérer les enregistrements
    $customer = $curseur->fetch(PDO::FETCH_ASSOC);

    return $customer;
}

function updCustomer(array $customer) {
    $connexion = connexion();
    
    // Préparer la requête SQL
    $sql = "UPDATE customer SET name_customer = :nom, discr = :profil WHERE id_customer = :idcustomer";
    
    // Enregistrer la requête préparée
    $curseur = $connexion->prepare($sql);
    
    // Exécuter la requête
    $curseur->execute(["id_customer" => $customer['id_customer'], ":nom"=> $customer['name_customer'], 
    ":profil"=> $customer['discr']]);
    
    // Récupérer le nombre d'enregistrements supprimés
    $nbcustomer = $curseur->rowCount();
    
    // Fermer le curseur / resultset
    $curseur->closeCursor();
    
    // Détruit la connexion
    $connexion = null;
    
    // Retourner un booléen (VRAI si 1 seul contact modifié)
    return ($nbcustomer === 1);
}
?>