<?php 
session_start();
include '../class/database.php';
if (!isset($_SESSION['users']))
    header("Location: ../index.php");
    
if($_POST){
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $id = $_SESSION['users']['id'];

    if($password == null || $repass == null)
        die("ErrorDataNull");

    $dt = new Database;
    $dt->Select("SELECT * from users where id = '{$_SESSION['users']['id']}' ");
    $User = $dt->Fetch();
    if($password != $User['password'])
        die("ErrorPassword");

    $sql = "UPDATE users set password = '{$repass}' where id = '{$id}'";
    $dt->Run($sql);
 

    echo "Success";
}
