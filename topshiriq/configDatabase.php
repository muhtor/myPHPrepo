<?php
try{
    $pdoQr = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $pdoQr->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
