<?php  session_start(); ?>

<?php

if(isset($_SESSION['usename']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }
else
{
    include 'login.html';
}

if(isset($_POST['submit']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['username'];
     $pass = $_POST['psw'];

    if(isset($_POST["username"]) && isset($_POST["psw"])){
    $file = fopen('visitors.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(",",$line);
       print_r ($array);
       echo $user ;
       echo $pass;
    if(trim($array[1]) == $_POST['username'] && trim($array[2]) == $_POST['psw']){
            $good=true;
            break;
        }
    }

    if($good){
    $_SESSION['usename'] = $user;
        //echo '<script type="text/javascript"> window.open("home.php","_self");</script>';  
        header("Location:home.php"); 
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        include 'login.html';
    }

}





?>
