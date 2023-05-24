<?php
    session_start();
    include_once "config.php";
    $friend_id = mysqli_real_escape_string($conn, $_POST['friend_id']);
    $status = "0";

    // check if they are already friends
    $check = mysqli_query($conn, "SELECT * FROM friend WHERE user_id = ".$_SESSION['user_id']." AND frn_user_id = ".$friend_id);
    $user = mysqli_query($conn, "SELECT * FROM users WHERE user_id = ".$_SESSION['user_id']);
    $row = mysqli_fetch_array($user);
    if (mysqli_num_rows($check) > 0) {
        //  header("location: ../chat.php?user_id=". $row['unique_id']);
        //  exit;
        echo "success";
    }else {
        $select = mysqli_query($conn, "INSERT INTO friend (user_id, frn_user_id, status, sendBy) VALUES ({$_SESSION['user_id']}, {$friend_id}, {$status}, {$_SESSION['user_id']})");
        $select1 = mysqli_query($conn, "INSERT INTO friend (frn_user_id, user_id, status, sendBy) VALUES ({$_SESSION['user_id']}, {$friend_id}, {$status}, {$_SESSION['user_id']})");

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_SESSION["uni".$friend_id];
        $message = "I want to connect with you";
            
        if ($select) {
            $sql2 = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            if($sql2) {
                echo "success1";
            }                    
        }
    }
?>