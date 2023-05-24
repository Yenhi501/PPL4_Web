<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birth = $_POST['birth'];
    $school = mysqli_real_escape_string($conn, $_POST['school']);
    $intro = mysqli_real_escape_string($conn, $_POST['intro']);

    if(!empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                            $update_query = mysqli_query($conn,"UPDATE users SET email = '{$email}', school = '{$school}', birth = '{$birth}', intro = '{$intro}', img = '{$new_img_name}' WHERE unique_id = '{$_SESSION['unique_id']}'");
                            
                            if($update_query){
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($select_sql2) > 0){
                                    echo "success";
                                }else{
                                    echo "This email address not Exist!";
                                }
                            }else{
                                echo "Something went wrong. Please try again!";
                            }
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }else {
                    $update_query =mysqli_query($conn,"UPDATE users SET email = '{$email}', school = '{$school}', birth = '{$birth}', intro = '{$intro}' WHERE unique_id = '{$_SESSION['unique_id']}'");
                                
                    if($update_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            echo "success";
                        }else{
                            echo "This email address not Exist!";
                        }
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }
            }
            
        }else{
            echo "$email is not a valid email!";
        }
    }
?>