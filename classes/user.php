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

        if($stmt->execute()){
            header('Location: ../autentification/login.php');
            exit();
        }
    }

    public function logIn($email, $password){
        session_start();

        if($email == "admin@gmail.com" && $password == "admin"){
            header('Location: ../pages/dashboard.php');
            exit();
        }

        $sqlcheck = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->pdo->prepare($sqlcheck);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user['password'])){
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['user_id'] = $user['user_id'];

                header('Location: ../index.php');
                exit();

            }else{
                $error_message = "Incorrect username or password.";
                header("Location: ../autentification/login.php?error=" . $error_message);
                exit();
            }
        }else{
            $error_message = "user not found!";
            header("Location: ../autentification/login.php?error=" . $error_message);
            exit();
        }
    }

    function seDisconnect(){
        
    }

}

?>