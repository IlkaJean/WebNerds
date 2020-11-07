<?php
// Starting session
session_start();
?>
<html>

<head>
  <title>User Login</title>
  <link rel="stylesheet" href="./signin-signup.css">
</head>

<body>

  <?php
  if ($_SESSION["username"]) {

  ?>
    <a href="./home.html" onclick="signup()"> Sign In</a>
    Welcome <?php echo $_SESSION["name"]; ?>.
  <?php
  } else echo "<h1>Go to home</h1>";
  ?>

  <form action="home.html" method="POST">
    <button type="submit" name="logout">Home</button>
  </form>
</body>

</html>
<?php
//log out
session_destroy();
// unset($_SESSION["id"]);
// unset($_SESSION["username"]);
// header("Location:login.html");
?>
