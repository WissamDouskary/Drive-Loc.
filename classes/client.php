<?php
require_once '../classes/user.php';
require_once '../classes/conn.php';

class client extends User{
    private $pdo;
    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function affichierLesVehicules(){

    }

    function rechercherVehucules(){

    }
    
    function filtrerVehicules(){

    }

    function ReserverVehicule(){

    }

    function gererAvis(){

    }

    function ShowAllClients(){
        $sql = "SELECT * FROM user";
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}

?>