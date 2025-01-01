<?php
session_start();

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

    function ReserverVehicule($date_debut, $date_fin, $client_id, $vehicule_id){
        $sql = "INSERT INTO reservation (date_debut, date_fin, status, user_id, vehicule_id)
                VALUES (:date_debut, :date_fin, 'waiting', :user_id, :vehicule_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":date_debut", $date_debut);
        $stmt->bindParam(":date_fin", $date_fin);
        $stmt->bindParam(":user_id", $client_id);
        $stmt->bindParam(":vehicule_id", $vehicule_id);

        if($stmt->execute()){
            header('Location: ../pages/reservation_page.php?vehiculeId='. $vehicule_id .'');
            exit();
        }
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

if (isset($_POST['reservation_submit']) && isset($_GET['vehicule_Id']) && isset($_GET['clientId'])) {
    
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $vehiculeId = $_GET['vehicule_Id'];
    $clientId = $_GET['clientId'];

    $client = new client();

    if ($date_debut >= date("Y-m-d") && $date_fin > $date_debut) {
        if ($client->ReserverVehicule($date_debut, $date_fin, $clientId, $vehiculeId)) {
            $_SESSION['success'] = "Reservation completed, wait for admin approval!";
            header('Location: ../pages/reservation_page.php?vehiculeId='. $vehiculeId .'');
            exit();
        }
    } else {
        $_SESSION['date_invalide'] = "Please enter a valid date!";
        header('Location: ../pages/reservation_page.php?vehiculeId='. $vehiculeId .'');
        exit();
    }
}

?>