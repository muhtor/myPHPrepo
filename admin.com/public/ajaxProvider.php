<?php

require_once 'configAdminDB.php';

$category_ID = $_POST['category_ID'];

if (!empty($category_ID)) {
    $sqlProduct = "SELECT * FROM `products` WHERE `category_id` = '$category_ID'";
    $product = $pdoQueryAdmin->prepare($sqlProduct);
    $product->execute();
    $products = $product->fetchAll(PDO::FETCH_ASSOC);

    $outProduct = '';
    foreach ($products as $product) {
        $outProduct .= '<option value="' . $product['id'] . '">' . $product['product_name'] . '</option>';
    }
    echo $outProduct;
}