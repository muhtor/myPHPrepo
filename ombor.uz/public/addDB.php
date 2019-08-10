<?php
require_once 'configDB.php';

function getPostProduct(){
    $posts = array();
    $posts[0] = $_POST['categories'];
    $posts[1] = $_POST['providers'];
    $posts[2] = $_POST['product'];
    $posts[3] = $_POST['quantity'];
    $posts[4] = $_POST['ulch_bir'];
    $posts[5] = $_POST['price'];
    $posts[6] = $_POST['country'];
    $posts[7] = $_POST['city'];
    $posts[8] = $_POST['phone'];
    $posts[9] = $_POST['delivered'];
    return $posts;
}

// add product
if (isset($_POST['addProduct'])){
    $data = getPostProduct();

    if (isset($_POST)) {
        $sqlInsert = "INSERT INTO `products` (
category_id, provider_id, product_name, quantity, ulch_bir_ID, price, country, city) VALUES (
:category_id, :provider_id, :product_name, :quantity, :ulch_bir_ID, :price, :country, :city)";
        $insertSTM = $pdoQuery->prepare($sqlInsert);
        $insertSTM->execute(array(
            ':category_id'      => $data[0],
            ':provider_id'      => $data[1],
            ':product_name'     => $data[2],
            ':quantity'         => $data[3],
            ':ulch_bir_ID'      => $data[4],
            ':price'            => $data[5],
            ':country'          => $data[6],
            ':city'             => $data[7],
        ));

        if ($insertSTM) {
            header("Location: listProduct.php");
            echo '<p class="alert alert-success bg-green">Good Job</p>';
        }
    }
}

/*********  Add category  ********/

function getPostCategory(){
    $posts = array();
    $posts[0] = $_POST['title'];
    $posts[1] = $_POST['category'];
    return $posts;
}

// add category
if (isset($_POST['addCategory'])){
    $data = getPostCategory();

    if (isset($_POST)) {
        $sqlInsert = "INSERT INTO `categories` (
title, category_name) VALUES (
:title, :category_name)";
        $insertSTM = $pdoQueryAdmin->prepare($sqlInsert);
        $insertSTM->execute(array(
            ':title'            => $data[0],
            ':category_name'    => $data[1],
        ));

        if ($insertSTM) {
            header("Location: listCategories.php");
            echo '<p class="alert alert-success bg-green">Good Job</p>';
        }
    }
}