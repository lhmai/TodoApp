<?php
session_start();
include '../class/database.php';
if (!isset($_SESSION['users']))
    header("Location: ../index.php");

    $id = $_SESSION['users']['id'];

    $object = new Database;
    $sql = "SELECT * from congviec where trangthai = 0 and id_user = {$_SESSION['users']['id']}";
    $object->Select($sql);
    while($rows = $object->Fetch()){
        $data['data'][] = $rows;
    }
    if ($data == null) {
        $data['data'] = [];
    }
    echo json_encode($data);
