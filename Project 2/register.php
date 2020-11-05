<?php

$file1 = "visitors.txt";
$current_content1 = file_get_contents($file1);

?>
<pre>
<!-- connect this to  login.html-->
header(Location:  )
</pre>
<?php
$current_content1 .= $_POST["name"] . "," . $_POST["username"] . "," .
  $_POST["psw"]  . "," . $_POST["cpsw"] . "\n";
file_put_contents($file1, $current_content1);
?>
<?php
// $visitors = file("visitors.txt");
// /* Find and get user */
// $user_info_line = '';
// for ($i = 0; $i < count($visitors); $i++) {
//   $user_info_line = strstr($visitors[$i], $_POST["name"]);
//   if ($user_info_line !== FALSE) {
//     break;
//   }
// }

// $user_info = explode(",", $user_info_line);
// $username = $user_info[1];
// $password = $user_info[2];
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- <a href="signup.html">Sign up</a> -->
  <a href="signup.html" onclick="signup()"> Sign In</a>

</body>

</html>
