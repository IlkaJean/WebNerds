<!--  code will only display the submitted values if the submit button was clicked-->
<?php
   if(isset($_POST['submit']) 
   {
      echo("First name: " . $_POST['firstname'] . "<br />\n");
      echo("Last name: " . $_POST['lastname'] . "<br />\n");
   }
?>

<form action="myform1.php" method="post">
   <p>First name: <input type="text" name="firstname" /></p>
   <p>Last name: <input type="text" name="firstname" /></p>
   <input type="submit" name="submit" value="Submit" />
</form>
