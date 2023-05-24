<?php
    session_start();
    include_once "config.php";
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $friend = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = ".$incoming_id);
    $row = mysqli_fetch_assoc($friend);
    $check = mysqli_query($conn, "SELECT * FROM friend WHERE user_id = ".$row['user_id']." AND frn_user_id = ".$_SESSION['user_id']." AND status = '0' AND sendBy = ".$row['user_id']);
    if (mysqli_num_rows($check) > 0) {
        echo "notfriend";
    }else {
        echo "friend";
    }
?>