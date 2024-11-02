<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="./favicon_io/favicon-16x16.png">
    <title>Sign-up Form</title>
    <style><?php include 'C:/xampp/htdocs/log in system/style.css'; ?></style>
  </head>
  <body>
    <div class="signup-form">
      <h1>Sign-up Form</h1>
      <form action="./Includes/signup.inc.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password0" required>
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <button type="submit">Sign up</button>
        <h4 style="color: red; text-align: center;"><?php  if(isset($_GET['error'])) echo $_GET['error'] ?></h4>
      </form>
      <p>Already have an account? <a href="http://localhost/log%20in%20system/">Login</a></p>
    </div>
  </body>
</html>
