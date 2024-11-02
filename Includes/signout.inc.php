<?php
unset($_COOKIE['password']); 
setcookie('password', null, -1, '/');
unset($_COOKIE['userName']); 
setcookie('userName', null, -1, '/');

header("location: ../index.php");
?>