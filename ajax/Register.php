<?php 

include '../class/database.php';
if (!isset($_SESSION['users']))
    header("Location: ../index.php");

if($_POST){
    $username = $_POST['txtUser'];
    $pass = $_POST['txtPass'];
    $fullname = $_POST['txtFullname'];
    $email = $_POST['txtEmail'];
    $repass = $_POST['txtRePass'];

    $dt = new Database;
    $dt->Select("SELECT * from users where username = '{$username}'");
    
    $count = $dt->dbCount();
    if($count > 0){
        die('ErrorUserAlready');
    }

    if($pass != $repass){
        die('ErrorPassNotMatch');
    }
    
    if($username == null || $pass == null || $fullname == null || $email == null || $repass == null){
        die('ErrorNullData');
    }

    $dt->Run("INSERT INTO users (username,password,fullname,email) VALUES (
        '{$username}','{$pass}','{$fullname}','{$email}'
    )");

    echo ('Success');
    
}