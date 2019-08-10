<?php
include 'configDatabase.php';
$id = $_GET['id'];
if (!empty($id)) {
    $userID = $pdoQr->prepare("DELETE FROM `user` WHERE `id` = $id");
    $userID->execute();
    if ($userID){
        header("Location: index.php"); /* Перенаправление браузера */
        echo 'OK';
    }else{
        echo 'Oops';
    }
}
