<?php 
session_start();
include '../class/database.php';
if (!isset($_SESSION['users']))
    header("Location: ../index.php");
    
if($_POST){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $id = $_SESSION['users']['id'];

    if($fullname == null || $email == null)
        die("ErrorDataNull");
    
    $sql = "UPDATE users set fullname = '{$fullname}' , email = '{$email}' where id = '{$id}'";
    $dt = new Database;
    $dt->Run($sql);

    $dt->Select("SELECT * from users where id = '{$_SESSION['users']['id']}' ");
    $_SESSION['users'] = $dt->Fetch();
    echo "Success";
}

?>