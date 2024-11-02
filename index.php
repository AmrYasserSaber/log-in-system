<?php
  if(isset($_COOKIE['userName']) & isset($_COOKIE['password'])) {
  header("location: ./app.php");
}
  $forgot = "http://localhost/log%20in%20system/forgot-password.php";
  $signUp="http://localhost/log%20in%20system/signup.php";
  $icon="http://localhost/log%20in%20system/favicon_io/favicon-16x16.png";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="<?php echo $icon ; ?>">
    <title>Login Form</title>
    <style><?php include 'C:/xampp/htdocs/log in system/style.css'; ?></style>
  </head>
  <body>
    <div class="login-form">
      <h1>Login Form</h1>
      <form action="./Includes/login.inc.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password0" name="password0" required>
        <button type="submit">Login</button>
        <h4 style="color: red; text-align: center;"><?php  if(isset($_GET['error'])) echo $_GET['error'] ?></h4>
      </form>
      <p>Don't have an account? <a href="<?php echo $signUp ; ?>">Sign up</a></p>
    </div>
  </body>
</html>
