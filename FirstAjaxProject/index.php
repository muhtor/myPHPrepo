<?php
require_once 'configAjax.php';

$sqlCountry = $pdoQueryAjax->query("SELECT * FROM `country`");
$countries = $sqlCountry->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>AjaxQuery</title>
</head>
<body>


<div class="container">
    <h2>First Project AJAX</h2>
    <form action="" method="post">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country">
                        <option value="0">Select Country</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?=$country['id'];?>">
                                <?=$country['title'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="country">State</label>
                    <select class="form-control" id="state">
                        <option>Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" id="city">
                        <option>Select City</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="divLoading"></div>
<style>
    #divLoading {
        display : none;
    }
    #divLoading.show{
        display : block;
        position : fixed;
        z-index: 100;
        background-image : url('3.gif');
        background-color:#eee8d5;
        opacity : 0.4;
        background-repeat : no-repeat;
        background-position : center;
        left : 0;
        bottom : 0;
        right : 0;
        top : 0;
    }
    #loadinggif.show {
        left : 50%;
        top : 50%;
        position : absolute;
        z-index : 101;
        width : 32px;
        height : 32px;
        margin-left : -16px;
        margin-top : -16px;
    }
</style>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>