<?php
// delete code
require_once "../connect.php";
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
} else {
    $id = 0;
}
$result = $conn->query("DELETE FROM `student` WHERE ID=$id"); // delete all
if ($result) {
    header("location: index.php");
}
