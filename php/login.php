<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        $sqlAdmin = mysqli_query($conn, "SELECT * FROM admins WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['user_id'] = $row['user_id'];
                    echo "user";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }
        else if(mysqli_num_rows($sqlAdmin) > 0)
        {
            $row = mysqli_fetch_assoc($sqlAdmin);
            $admin_pass = $row['password'];
            if($password === $admin_pass){
                $_SESSION['admin'] = $row['email'];
                echo "admin";
            }else{
                echo "Email or Password is Incorrect!";
            }
        }
        else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>