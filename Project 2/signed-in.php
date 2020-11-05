<?php
// Starting session
session_start();

$visitors = readfile("visitors.txt");
/* Find and get user */
$user_info_line = '';
for ($i = 0; $i < count($visitors); $i++) {
  $user_info_line = strstr($visitors[$i], $_POST["username"]);
  if ($user_info_line !== FALSE) {
    break;
  }
}

$user_info = explode(",", $user_info_line);

$username = $user_info[0]; //gives me username
echo $username;
$password = $user_info[1]; //gives me password
echo $password;

header("Location:quizz.html");
if (count($_POST) > 0) {
if ($_POST["username"] == $username && $_POST["psw"] == $password) { //need to make this robust
  $_SESSION["user_id"] = 1001;
  $_SESSION["username"] = $_POST["username"];
  $_SESSION['loggedin_time'] = time();
  header("location:quizz.html");
} else {
  $message = "Invalid Username or Password!";
  echo $message;
}
}

if (isset($_SESSION["user_id"])) {
if (isLoginSessionExpired()) {
      header("Location:quizz.html");// take it to quizzes.html
} else {
     header("Location:home.html");
  }
}

function isLoginSessionExpired()
 {
   $login_session_duration = 10;
   $current_time = time();
   if (isset($_SESSION['loggedin_time']) && isset($_SESSION["user_id"])) {
     if (((time() - $_SESSION['loggedin_time']) > $login_session_duration)) {
       return true;
     }
   }
   return false;
}
?>

