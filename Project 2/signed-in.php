<?php 
session_start();
$session = $_POST["username"];
$_SESSION["username"] = $session;

echo "hi, you're logged in". $_SESSION["username"];
?>