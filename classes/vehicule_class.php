<?php 
require_once '../classes/conn.php';

class Vehicule {
    protected $modele;
    protected $marque;
    protected $prix;
    protected $status;
    protected $Vehicule_image;
    protected $Categorie_id;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function AjouterVehicule($modele, $marque, $prix, $Vehicule_image, $Categorie_id){
        $this->modele = $modele;
        $this->marque = $marque;
        $this->prix = $prix;
        $this->Categorie_id = $Categorie_id;

        if(isset($Vehicule_image)) {
            $uploadDir = '../uploads/';
            $fileName = basename($Vehicule_image['name']);
            $targetFilePath = $uploadDir . $fileName;
    
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            if (move_uploaded_file($Vehicule_image['tmp_name'], $targetFilePath)) {
                $this->Vehicule_image = $targetFilePath;
            } else {
                die("Error uploading the image file.");
            }
        } else {
            die("Error: Invalid image file.");
        }

        $sql = "INSERT INTO vehicule (modele, marque, prix, status, vehicule_image, Categorie_id)
                VALUES (:model, :marque, :prix, 'active', :vehicule_image, :Categorie_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':model', $modele);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':vehicule_image', $this->Vehicule_image);
        $stmt->bindParam(':Categorie_id', $Categorie_id);

        if($stmt->execute()){
            header('Location: ../pages/dashboard.php');
            exit();
        }
    }

    function verifierDisponibilite(){
        
    }

    function showAllVehicule(){
        $sql = "SELECT v.*, c.nom
                FROM vehicule v
                LEFT JOIN Categorie c
                ON v.Categorie_id = c.Categorie_id";
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

?>