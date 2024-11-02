<?php 
Class Signup extends Dbh{
    protected function setUser($userName,$password0,$email){
        include "../Includes/config.inc.php";
        $statment = $this->connect($host,$db,$user,$password )->prepare('INSERT INTO users (name, users_password, users_email) VALUES (:name, :password, :email);');

        $hashedpassword =password_hash($password0,PASSWORD_DEFAULT);

        if(!$statment->execute([$userName,$hashedpassword,$email]))
        {
            $statment=null;
            header("location: ../index.php?error=statment failed");
            exit();
        }
        $statment =null;
        setcookie("password",$hashedpassword, time() + (86400 * 30),"/");
        setcookie("userName",$userName, time() + (86400 * 30),"/");
        setcookie("email", $email, time() + (86400 * 30), "/");
        header("location: ./app.php");
    }
    protected function checkUserExistance($userName,$email){
        include "../Includes/config.inc.php";
        $pdo = $this->connect($host, $db, $user, $password);
        $statment = $pdo->prepare("SELECT name, users_email FROM users WHERE name = :name AND users_email = :users_email");

        if(!$statment->execute(['name' => $userName, 'users_email' => $email]))
        {
            $statment=null;
            header("location: ../index.php?error=statment failed");
            exit();
        }
        if($statment->rowCount() > 0){
            $result=false;
        }
        else {
            $result=true;
        }
        return $result;
    }
}