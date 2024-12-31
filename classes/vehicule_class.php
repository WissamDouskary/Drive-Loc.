<?php 
require_once '../classes/conn.php';

class Vehicule {
    protected $modele;
    protected $marque;
    protected $prix;
    protected $status;
    protected $Vehicule_image;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function AjouterVehicule($modele, $marque, $prix, $Vehicule_image){
        $this->modele = $modele;
        $this->marque = $marque;
        $this->prix = $prix;
        $this->Vehicule_image = $Vehicule_image;

        $sql = "INSERT INTO vehicule (modele, marque, prix, status, vehicule_image)
                VALUES (:model, :marque, prix, active, :vehicule_image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':model', $modele);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':vehicule_image', $vehicule_image);

        if($stmt->execute()){
            header('Location: ../pages/dashboard.php');
            exit();
        }
    }

    function verifierDisponibilite(){
        
    }
}

?>