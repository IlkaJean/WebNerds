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
if($_SESSION["username"]) {
?>
Welcome <?php echo $_SESSION["name"]; ?>.
<?php
}else echo "<h1>Please login first .</h1>";
?>

<form action="login.html" method="POST">
<button type="submit" name="logout">log Out</button>
</form>
</body>
</html>
<?php

//log out

session_start();
//unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("Location:login.html");
?>
