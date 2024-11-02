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
    <?php include 'C:/xampp/htdocs/log in system/styles.app.css'; ?>
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

  <div class="app-form">
    <h1>welcome! <?php echo $_COOKIE["userName"] ?></h1>
    <form action="./create a product.php" method="POST" class="product-handling-form">
      <button type="submit">Create a product</button>
    </form>
    <form action="./delete a product.php" method="POST" class="product-handling-form">
      <button type="submit">Delete a product</button>
    </form>
    <form action="./get a product.php" method="POST" class="product-handling-form">
      <button type="submit">Get a product</button>
    </form>
    <form action="./update a product.php" method="POST" class="product-handling-form">
      <button type="submit">Update a product</button>
    </form>
    <h4 style=""><?php if (isset($_GET['error'])) echo $_GET['error'] ?></h4>
  </div>
</body>

</html>