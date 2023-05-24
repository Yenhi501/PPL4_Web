<?php
include_once "config.php";
$sql = "SELECT * FROM food";
$rs = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($rs)) {
        $myId = $_REQUEST[$row['food_id']];
        if ($myId == $row['food_id']) {
            $sql1 = "DELETE FROM food WHERE food_id = ".$myId;
            $rs1 = mysqli_query($conn, $sql1);
        }
    }

if ($i == $N) header('Location: ' . $_SERVER['HTTP_REFERER']);
?>