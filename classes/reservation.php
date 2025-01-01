<?php 
require_once '../classes/conn.php';

class reservation {
    protected $date_debut;
    protected $date_fin;
    protected $status;
    protected $price;
    private $pdo;

    function __construct(){
        $connection = new DBconnection();
        $this->pdo = $connection->PDOconnect();
    }

    public function getAllReservations() {
        $sql = "SELECT r.*, 
                       CONCAT(u.nom, ' ', u.prenom) as client_name,
                       CONCAT(v.marque, ' ', v.modele) as vehicle_name
                FROM reservation r
                JOIN user u ON r.user_id = u.user_id
                JOIN vehicule v ON r.vehicule_id = v.vehicule_id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateReservationStatus($reservation_id, $status) {
        $sql = "UPDATE reservation SET status = ? WHERE reservation_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$status, $reservation_id]);
    }
}

?>