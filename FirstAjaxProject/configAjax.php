<?php
try {
    $pdoQueryAjax = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
    $pdoQueryAjax->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Xatolik: " . $e->getMessage() . "<br/>";
    die();
}