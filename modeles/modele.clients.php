<?php
require_once "/modeles/modele.inc.php";

/**
 * Summary of getListCustomers
 * @return array
 */
function getListCustomers()
{
    $mysql = connexion();
    $sql = "SELECT * FROM customers";

    $reponse = $mysql->query($sql);

    $resultatsL = $reponse->fetchAll();

    $reponse->closeCursor();

    return $resultatsL;
}
/**
 * Summary of insCustomers
 *
 * @param string $nom
 * @return void
 */
function insCustomers(string $nom)
{
    $mysql = connexion();

    $sql = "INSERT INTO customers (name_customer) VALUES (?)";


    $reponse = $mysql->prepare($sql);


    try {
        $resultatsI = $reponse->execute([$nom]);
    } catch (PDOException $e) {
        $resultatsI = false;
    }

    $reponse->closeCursor();
    echo "<h1> Le Client  ".$nom." à bien été crée</h1>";
    return;
}

/**
 * Summary of SearchCustomers
 *
 * @param string $nom
 * @return void
 */
function searchCustomers(string $nom)
{
    $mysql = connexion();

    $sql = "SELECT * FROM customer WHERE name_customer LIKE :nom ";


    $reponse = $mysql->prepare($sql);

    $reponse->execute([":nom" => '%' . $nom . '%']);
    $resultatsR = $reponse->fetchAll(PDO::FETCH_ASSOC);

    $reponse->closeCursor();

    return;
}
/**
 * Summary of searchIdCustomers
 *
 * @param integer $id
 * @return void
 */
function searchIdCustomers(int $id)
{

    $mysql = connexion();

    $sql = ("SELECT * FROM customer  WHERE id_customer=?");

    $resultatsM = $mysql->prepare($sql);

    $resultatsM->execute([$id]);

    $customers = $resultatsM->fetch(PDO::FETCH_ASSOC);

    return $customers;
}

/**
 * Summary of updCustomers
 * 
 * @param mixed $customers
 * @return PDOStatement|bool
 */
function updCustomers($customers)
{

    $mysql = connexion();

    

    $sql = "UPDATE customer SET name_customer = :nom WHERE id_customer=:id";
    


    $resultatsM = $mysql->prepare($sql);


    $resultatsM->execute([":id" => $customers['id_customer'], ":nom" => $customers['name_customer'],]);


    $resultatsM->closeCursor();
    echo "<h1> Le Client ".$customers['name_customer']." à bien été modifié</h1>";

    return $resultatsM;
}

/**
 * Summary of delCustomers
 * @param mixed $id
 * @return PDOStatement|bool
 */
function delCustomers(int $id)
{
    $mysql = connexion();

    $sql = "DELETE FROM customer  WHERE id_customer=?";
    
    $resultatsD = $mysql->prepare($sql);
    
    $resultatsD->execute([$id]);
    
    // echo "le nombre d'enregistrement touché est de : ".$resultatsD->rowCount();
    echo "<br><h1>L'indentifiant N° : $id vient d'être supprimé</h1>";


    $resultatsD->closeCursor();
    
    return $resultatsD;
}

?>
