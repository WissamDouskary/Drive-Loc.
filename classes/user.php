<?php 
require_once '../classes/conn.php';


class User {
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $role;
    private $pdo;

    function __construct() {
        $dbConnection = new DBconnection();
        $this->pdo = $dbConnection->PDOconnect();
    }

    public function signUp($nom, $prenom, $email, $password) {

        $sqlCheck = "SELECT * FROM user WHERE email = :email";
        $stmtCheck = $this->pdo->prepare($sqlCheck);
        $stmtCheck->bindParam(':email', $email);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            echo "<script>alert('Email already in use. Please choose a different email')</script>";
            return;
        }

        $hashedpass = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO user(nom, prenom, email, password, role_id)
                VALUES (:nom, :prenom, :email, :password, 2)";
            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedpass);

        $stmt->execute();
    }

}

?>