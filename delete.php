<?php
$title = "Xóa công việc";
include 'layouts/header.php';
include 'class/database.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");

$idJobs = $_GET['id'];
$dt = new Database;
$check = "SELECT * from congviec where id = '{$idJobs}' and id_user = '{$_SESSION['users']['id']}'";
$dt->Select($check);
$data = $dt->Fetch();
$resultCheck = $dt->dbCount();

if ($resultCheck < 1) {
    header("Location: index.php");
}

$sql = "DELETE from congviec where id = '{$idJobs}'";
$dt->Run($sql);
header("Location: home.php");
