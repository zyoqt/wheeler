<?php
Class Controller {
    private $con;

    public function __construct() {
        require_once('./config.php');
        $this->con = $con;
    }

    function login(){
        extract($_POST);

        $sql = "SELECT id, password FROM users WHERE email = ?";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);

        if($stmt->execute()){
            $stmt->store_result();
            if ($stmt->num_rows >  0) {
                $stmt->bind_result($id, $db_password);
                $stmt->fetch();

                if(password_verify($password, $db_password)){          
                    session_start();
                    $_SESSION['id'] = $id;

                    echo 'login-success';  

                }else{
                    echo 'invalid-credentials';
                }

            }else{
                echo 'user-not-found';
            }
        }else{
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }
    }

    function signup() {
        extract($_POST);

        if($password != $cpassword){
            echo 'password-unmatched';
            return;
        }

        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);

        if($stmt->execute()){
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                echo 'email-taken';
            }else{
                $stmt->close(); 

                $sql = "INSERT INTO users (username, email, password, date_created) VALUES (?, ?, ?, NOW())";

                $stmt = $this->con->prepare($sql);
                $stmt->bind_param("sss", $username, $email, $hash_pass);

                if($stmt->execute()){
                    echo 'reg-success';
                }else{
                    echo "Error: " . $sql . "<br>" . $stmt->error;
                }
            }
        }else{
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }
    }

    function logout(){
        session_start();
        session_destroy();
        echo 'logout-success';
    }
}
?>