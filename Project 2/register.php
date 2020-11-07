<!DOCTYPE>

<html>

<head>

  <title>ByteTyme</title>

  <link href="./signin-signup.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <?php
  $array = array("name", "username", "psw", "cpsw");
  $errorMessage = array();

  /* Confirm that values are present before accessing them. */

  if (isset($_POST['name'])) {

    $array['name'] = ($_POST['name']);
  }

  if (isset($_POST['username'])) {

    $array['username'] = ($_POST['username']);
  }

  if (isset($_POST['psw'])) {

    $array['psw'] = ($_POST['psw']);
  }

  if (isset($_POST['cpsw'])) {

    $array['cpsw'] = ($_POST['cpsw']);
  }

  if (preg_match("/[0-9]/", $_POST["name"]) === 1) {

    $errorMessage[] = "Name contains other characters. Name must be alphabets only.";
  }

  // to check that user is not creating second account

//   $file = file_get_contents("visitors.txt");

//   $line = explode("\n", $file);

//   $usern = $_POST["name"];

//   foreach ($line as $j) {

//     $j = trim($j);

//     //echo $j;

//     $l = explode(",", $j);

//     foreach ($l as $k) {

//       $k = trim($k);

//       if ((strstr($k, $usern)) == true) {
//         $errorMessage[] = "Name is already in the database.";
      
//       }
//     }
   
//   }

  //fclose($file);

  $nameofUser = explode(" ", $array["name"]);

  for ($i = 0; $i < count($nameofUser); $i++) {

    if (strcmp(ucfirst($nameofUser[$i]), $nameofUser[$i]) !== 0) {

      $errorMessage[] = "Make sure that both letters of your name are capitalized.";

      break;
    }
  }

  if (($_POST["psw"]) != ($_POST["cpsw"])) {

    $errorMessage[] = "Password Confirmation does not match.";
  }

  if (strlen($_POST["psw"]) <= 6 && strlen($_POST["cpsw"]) <= 6) {

    $errorMessage[] = "Password too short.";
  }

  if (empty($errorMessage)) {

  

    $myfile = fopen("visitors.txt", "a+") or die("Unable to open file!");
    $txt = $_POST["name"] . "," . $_POST["username"] . "," . $_POST["psw"] . "," . $_POST["cpsw"] ."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    //echo file_get_contents("visitors.txt");

  ?>

    <pre>

        <h3>Welcome, to ByteTyme!<h3><br>

        Hello, <?= $_POST["name"] ?>!

        Now <a href="login.html">log in to earn all the bytes!</a>

    </pre>

  <?php

  } else {
  ?>
    <p>
      <strong>The error(s) you need to fix :) :</strong>

      <?php

      foreach ($errorMessage as $errorMessage) {
      ?>
        <p><?= $errorMessage ?> </p>

      <?php } ?>

    </p>

  <?php
  }
  ?>

</body>

</html>
