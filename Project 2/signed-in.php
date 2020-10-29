<?php
$visitors = file("visitors.txt");
/* Find and get user */
$user_info_line = '';
for ($i = 0; $i < count($visitors); $i++) {
  $user_info_line = strstr($visitors[$i], $_GET["name"]);
  if ($user_info_line !== FALSE) {
    break;
  }
}

$user_info = explode(",", $user_info_line);
$username = $user_info[1];//gives me username
$password = $user_info[2];//gives me password
?>


<?php 
// session_start();
// $session = $_POST["username"];
// $_SESSION["username"] = $session;
// echo "hi, you're logged in". $_SESSION["username"];
?>
<?php
//Creating User Login Session
//In this code, we are adding logged-in user id and logged-in time 
//to a session variable. Then, we are invoking a PHP function to check
//if the login session expiration time is elapsed. If it is not reached, 
//then the user will be redirected to the dashboard.

//$username = $_POST["username"];

if (count($_POST) > 0) {
  if ($_POST["username"] == $username and $_POST["password"] == $password) { //need to make this robust
    $_SESSION["user_id"] = 1001;
    $_SESSION["username"] = $_POST["username"];
    $_SESSION['loggedin_time'] = time();
  } else {
    $message = "Invalid Username or Password!";
  }
}

if (isset($_SESSION["user_id"])) {
  if (!isLoginSessionExpired()) {
     header("Location:Direct_me.php");// take it to quizzes.html
  } else {
    header("Location:logout.php?session_expired=1");
  }
}

?>
<?php
// PHP Function for Checking Login Session Timeout
//This function will be invoked at the beginning of all 
//authenticated pages. This function returns TRUE if the 
//user login session is expired, FALSE otherwise.
function isLoginSessionExpired()
{
  $login_session_duration = 10;
  $current_time = time();
  if (isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])) {
    if (((time() - $_SESSION['loggedin_time']) > $login_session_duration)) {
      return true;
    }
  }
  return false;
}
?>
<?php 
//User Login Session Expiration Logout
//This logout.php page will “unset” logged-in user session and check 
//for the status of the session_expired flag. If it is set, then the login 
//session timeout message will be displayed to the user.


//Need to direct me to the needed url to the sign in page
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["username"]);
$url = "login.html"; // ask the user to login again for more session
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");

?>
