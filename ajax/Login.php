<?php 
session_start();
include '../class/database.php';

if($_POST){
    $username = $_POST['logUser'];
    $pass = $_POST['logPass'];

    $dt = new Database;
    $dt->Select("SELECT * from users where username = '{$username}' and password = '{$pass}'");
    $count = $dt->dbCount();
    if($count < 1)
        die("ErrorLogin");
    
    $_SESSION['users'] = $dt->Fetch();
    echo "Success";
}