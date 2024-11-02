<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $passwordRepeat = $_POST["confirm-password"];
    $password0 = $_POST["password0"];

    
    include "../Classes/db.classes.php";
    include "../Classes/signup.classes.php";
    include "../Classes/signup-controler.classes.php";
    
    $signup = new SignupControler($userName, $email, $password0, $passwordRepeat);
    
    
    $signup->signupUser();

    header("location: ../app.php");
}
