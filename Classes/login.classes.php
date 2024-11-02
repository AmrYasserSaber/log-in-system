<?php
class Login extends Dbh
{
    protected function getUser($userName, $password0)
    {
        include "../Includes/config.inc.php";
        $statment = $this->connect($host,$db,$user,$password )->prepare('SELECT users_password FROM users WHERE name =? ;');

        $hashedpassword = password_hash($password0, PASSWORD_DEFAULT);
        if (!$statment->execute([$userName])) {
            $statment = null;
            header("location: ../index.php?error=statment failed");
            exit();
        }
        if ($statment->rowCount() == 0) {
            $statment = null;
            header("location: ../index.php?error=user not found");
            exit();
        }

        $pwdHashed = $statment->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($password0, $pwdHashed[0]["users_password"]);

        if ($checkPwd == false) {
            $statment = null;
            header("location: ../index.php?error=wrong password");
            exit();
        } elseif ($checkPwd == true) {
            $statment = $this->connect($host,$db,$user,$password )->prepare('SELECT * FROM users WHERE name=? ;');

            if (!$statment->execute([$userName])) {
                $statment = null;
                header("location: ../index.php?error=statment failed");
                exit();
            }

            if ($statment->rowCount() == 0) {
                echo $hashedpassword;
                header("location: ../index.php?error=statment failed");
                exit();
            }

            $user = $statment->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            header("refresh: 2; url=./login.classes.php");
            setcookie("password", $hashedpassword, time() + (86400 * 30), "/");
            setcookie("userName", $user[0]["name"], time() + (86400 * 30), "/");
            setcookie("email", $user[0]["users_email"], time() + (86400 * 30), "/");
            header("location: ../app.php");
        }


        $statment = null;
    }
}
