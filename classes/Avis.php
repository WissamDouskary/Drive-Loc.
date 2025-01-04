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
        $sql = "SELECT u.nom, u.prenom, a.commentaire, a.date_creation
                FROM user u 
                LEFT JOIN avis a
                ON a.user_id = u.user_id
                WHERE a.vehicule_id = :vehicule_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":vehicule_id", $vehicule_id);

        $stmt->execute();

        return $stmt->fetchAll(pdo::FETCH_ASSOC);

    }

    function modifierAvis(){

    }

    function supprimerAvis(){
        
    }
}

?>