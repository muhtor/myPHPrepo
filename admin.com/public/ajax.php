<?php

require_once 'configAdminDB.php';

$category_ID = $_POST['category_ID'];
$type = $_POST['type'];

if (!empty($category_ID) && $type == 'product'){
    $sqlProduct = "SELECT * FROM `products` WHERE `category_id` = '$category_ID'";
    $product = $pdoQueryAdmin->prepare($sqlProduct);
    $product->execute();
    $products = $product->fetchAll(PDO::FETCH_ASSOC);

    $outProduct = '';
    foreach ($products as $product) {
        $outProduct .= '<option value="'.$product['id'].'">' . $product['product_name']. '</option>';
    }
    echo $outProduct;
}
if (!empty($provider_ID) && $type == 'provider'){

}
$provider_ID = $_POST['provider_ID'];

$sqlProvider = "SELECT * FROM `providers` WHERE providers.product_id = '$provider_ID'";
$provider = $pdoQueryAdmin->prepare($sqlProvider);
$provider->execute();
$providers = $provider->fetchAll(PDO::FETCH_ASSOC);

$outProvider = '';
foreach ($providers as $provider) {
    $outProvider .= '<option value="'.$provider['id'].'">' . $provider['provider_name']. '</option>';
}
echo $outProvider;
