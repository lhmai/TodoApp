<?php 
session_start();
if(isset($_SESSION['users']))
session_unset($_SESSION['users']);
header("Location: index.php");

?>