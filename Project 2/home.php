<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
       <link rel="stylesheet" href="./home.css">
  </head>
  <body>
<?php
 session_start();
 //$_SESSION['username'] = $username; 
?>


  
<h1 id="byte"> ByteTyme</h1>

<div  class="homecontainer">
  
  <div class="home">

      <a href="./test.html">Test Your Knowledge</a>
  </div>

  <div class="home">
      <a href="./board.php">Leadership Board</a>
  </div>

  <div class="home">
  <a href="./about.html">About</a>
  </div>

  <div class="home">
      <a href="./login.html">Logout</a>
  </div>


</div>


</body>
</html>