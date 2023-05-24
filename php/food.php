<?php
    session_start();
    include_once "config.php";
    $food_id = mysqli_real_escape_string($conn, $_POST['food']);
    $time = time();
    $select_food = mysqli_query($conn, "INSERT INTO food_user (user_id, food_id, time) VALUES ({$_SESSION['user_id']}, {$food_id}, {$time})");
    $_SESSION['time'] = $time;
    if ($_POST['gender'] == 'Male') {
        $_SESSION['gender'] = 1;
    } else {
        $_SESSION['gender'] = 0;
    }
    $school = $_POST['school'];
    $N = count($school);
    $_SESSION['numberOfSchool'] = $N;
    for($i=0; $i < $N; $i++)
    {
        $_SESSION["'".$i."'"] = $school[$i];
    }
    if ($select_food) {
        echo "success";
    } else {
        echo "error";
    }
?>