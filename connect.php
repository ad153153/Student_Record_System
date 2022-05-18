<?php
// 1- 
try {
    $conn = new PDO("mysql:host=localhost;dbname=srs", "root", "");

} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
?>