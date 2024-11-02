<?php
$signUp = "http://localhost/log%20in%20system/signup.php";
$icon = "http://localhost/log%20in%20system/favicon_io/favicon-16x16.png";
$logo = "http://localhost/log%20in%20system/logo/lets-shopping-logo-design.jpg";

if (!isset($_COOKIE["userName"]) && !isset($_COOKIE["password"]) && !isset($_COOKIE["email"])) {
    header("location: ./index.php?");
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="<?php echo $icon; ?>">
    <title>My App</title>
    <style>
        <?php include 'C:/xampp/htdocs/log in system/productHandling.css'; ?>
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="<?php echo $logo; ?>" alt="Logo">
        </div>
        <div class="nav">
            <form action="./Includes/signout.inc.php" method="POST" class="sign-out-form">
                <button type="submit">Sign Out</button>
            </form>
        </div>
    </div>
    <form action="./Includes/product.inc.php?functionality=delete" method="post">
        <label for="product name">Product name:</label>
        <input type="text" id="product_name" name="product_name" required>
        <button type="submit">Delete</button>
    </form>
    <form action="./app.php" method="POST" class="returnToMain">
        <button type="submit">return to main</button>
    </form>
    <h4 style="color: red; text-align: center;"><?php  if(isset($_GET['error'])) echo $_GET['error'] ?></h4>
    <h4 style="color: green; text-align: center;"><?php  if(isset($_GET['result'])) echo $_GET['result'] ?></h4>

</html>