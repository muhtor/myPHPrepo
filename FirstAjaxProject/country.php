<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    require_once 'configAjax.php';
    $sqlCity = $pdoQueryAjax->query("SELECT * FROM `city` WHERE `country_id`='".$_POST["country"]."'");
    $cities = $sqlCity->fetchAll();

    if ($cities){
        foreach ($cities as $city){
            echo "<option value='".$city["id"]."'>".$city['city']."</option>";
        }
    }

}
