<?php
require_once 'configDatabase.php';

$login = '';
$name = '';
$age = '';
$password = '';

function getPosts(){
    $posts = array();
    $posts[0] = $_POST['login'];
    $posts[1] = $_POST['name'];
    $posts[2] = $_POST['age'];
    $posts[3] = $_POST['password'];
    return $posts;
}
// create user
if (isset($_POST['insert'])){
    $data = getPosts();

    if (isset($_POST)) {
        $insertSTM = $pdoQr->prepare('INSERT INTO user (login, name, age, password) 
                                            VALUES (:login, :name, :age, :password)');
        $insertSTM->execute(array(
            ':login'        => $data[0],
            ':name'         => $data[1],
            ':age'          => $data[2],
            ':password'     => $data[3],
        ));

        if ($insertSTM) {
            header("Location: /index.php");
            echo 'YES';
        }


    }
}


/* Убедиться, что код ниже не выполнится после перенаправления .*/
//exit;