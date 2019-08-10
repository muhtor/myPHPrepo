<?php
try {
    $pdoQueryAdmin = new PDO('mysql:host=localhost;dbname=admin', 'root', '');
    $pdoQueryAdmin->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Xatolik: " . $e->getMessage() . "<br/>";
    die();
}
