<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $password0 = $_POST["password0"];
    
    include "../Classes/db.classes.php";
    include "../Classes/login.classes.php";
    include "../Classes/login-controler.classes.php";
    
    $signup = new LoginControler($userName,$password0);
    
    
    $signup->loginUser();
    
}
