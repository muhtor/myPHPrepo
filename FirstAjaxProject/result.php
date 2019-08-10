<?php
require_once 'configAjax.php';
$type = $_POST['type'];
$country_id = $_POST['country_ID'];

if (!empty($country_id) && $type == 'state'){
    $sqlCities = "SELECT * FROM `city` WHERE `country_id` = '$country_id'";
    $sqlAllCity = $pdoQueryAjax->prepare($sqlCities);
    $sqlAllCity->execute();
    $resultCities = $sqlAllCity->fetchAll(PDO::FETCH_ASSOC);


    $outCity = '';
    foreach ($resultCities as $city){
        $outCity .= '<option value='.$city['id'].'>'.$city['name'].'</option>';
    }
    echo $outCity;
}
$region_id = $_POST['city_ID'];

if (!empty($region_id) && $type == 'city'){
    $sqlRegion = "SELECT * FROM `region` WHERE `city_id` = '$region_id'";
    $sqlAllReg = $pdoQueryAjax->prepare($sqlRegion);
    $sqlAllReg->execute();
    $resultRegions = $sqlAllReg->fetchAll(PDO::FETCH_ASSOC);


    $outRegion = '';
    foreach ($resultRegions as $region){
        $outRegion .= '<option value='.$region['id'].'>'.$region['name'].'</option>';
    }
    echo $outRegion;
}
