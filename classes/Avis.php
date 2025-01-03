<?php 
require_once '../classes/conn.php';

class Avis {
    protected $Commentaire;
    protected $date_creation;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    function ajouterAvis($commentaire, $user_id, $vehicule_id){
        $sql = "INSERT INTO avis(commentaire, date_creation, user_id, vehicule_id)
                VALUES (:commentaire, CURDATE(), :user_id, :vehicule_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':commentaire', $commentaire);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':vehicule_id', $vehicule_id);

        if($stmt->execute()){
            $_SESSION['commentAdd'] = "Review added successfully!";
            header('Location: ../pages/reservation_page.php?vehiculeId='. $vehicule_id .'');
            exit();
        }else{
            $_SESSION['commentdontAdd'] = "An error on your review. please try again!";
            header('Location: ../pages/reservation_page.php?vehiculeId='. $vehicule_id .'');
            exit();
        }
    }

    function showAvis($vehicule_id){
        
    }

    function modifierAvis(){

    }

    function supprimerAvis(){
        
    }
}

?>