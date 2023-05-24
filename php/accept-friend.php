<?php
    session_start();
    include_once "config.php";
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $friend = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = ".$incoming_id);
    $row = mysqli_fetch_assoc($friend);

    $check = mysqli_query($conn, "UPDATE friend SET status = '1' WHERE user_id = ".$_SESSION['user_id']." AND frn_user_id = ".$row['user_id']." AND status = '0'");
    mysqli_query($conn, "UPDATE friend SET status = '1' WHERE frn_user_id = ".$_SESSION['user_id']." AND user_id = ".$row['user_id']." AND status = '0'");
    if ($check) {
        echo "success";
    }else {
        echo "error";
    }
?>