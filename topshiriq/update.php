<?php
include 'configDatabase.php';

$id = $_POST['id'];
function getPosts(){
    $posts = array();
    $posts[0] = $_POST['login'];
    $posts[1] = $_POST['name'];
    $posts[2] = $_POST['age'];
    $posts[3] = $_POST['password'];
    return $posts;
}


// update user
if (isset($_POST['update'])){
    $data = getPosts();
    if (isset($_POST)) {
        $updateSTM = $pdoQr->prepare("UPDATE `user` SET `login` = :login, `name` = :name, `age` = :age,
 `password` = :password WHERE `id` = $id");
        $updateSTM->execute(array(
            ':login'        => $data[0],
            ':name'         => $data[1],
            ':age'          => $data[2],
            ':password'     => $data[3],
        ));

        if ($updateSTM) {
            header("Location: /index.php");
        }
        echo '<h2 class="alert alert-success">User muvaffaqiyatli yangilandi!</h2>';
    }
}



