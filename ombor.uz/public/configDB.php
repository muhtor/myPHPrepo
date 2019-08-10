<?php
try {
    $pdoQuery = new PDO('mysql:host=localhost;dbname=ombor', 'root', '');
    $pdoQuery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Xatolik: " . $e->getMessage() . "<br/>";
    die();
}
