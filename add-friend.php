<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon Fontawesome-->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.2-web (1)/fontawesome-free-6.1.2-web/css/all.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="./css/style_lfriend.css">
    <title>Add Friend</title>
</head>
<?php 
  session_start();
  include_once "php/config.php";
?>
<?php include_once "header.php"; ?>
<body>
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="menu__container bd-grid">
            <?php 
                $offset = 7200;
                $sql = mysqli_query($conn, "SELECT * FROM food_user WHERE time < ".$_SESSION['time']+$offset." AND time > " .$_SESSION['time']-$offset . " AND user_id != ".$_SESSION['user_id']);
                
                while($row = mysqli_fetch_assoc($sql)) {
                    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE user_id =". $row['user_id']." AND gender = ".$_SESSION['gender']);
                    while($row2 = mysqli_fetch_assoc($sql2))
                        for($i = 0; $i <$_SESSION['numberOfSchool']; $i++) {
                            if (str_contains($row2['school'],$_SESSION["'".$i."'"])) 
                            {
                                $_SESSION["uni".$row2['user_id']] = $row2['unique_id'];
                                echo "<div class='menu__content' id='div".$row2['user_id']."'>
                                <img class='menu__img' src = './php/images/".$row2['img']."'>
                                <input type='button' class='btn card__button' name='friend' id='".$row2['user_id']."' value='Gửi lời mời đến ".$row2['fname'] ." ". $row2['lname']."'>
                                </div>";
                            }

                        }
                }
            ?>
        </div>
    </form>
</body>
<script src="javascript/add_friend.js"></script>
<style>
    .menu__container{
        margin-top:-200px !important;
    }
    .menu__img{
        width: 150px !important;
        height: 150px !important;
        border-radius: 0 !important;
        border: 2px solid #ee4957 !important;
    }
    .card__button{
        margin-bottom: 20px !important;
        padding: 1rem 2rem !important;
    }
</style>