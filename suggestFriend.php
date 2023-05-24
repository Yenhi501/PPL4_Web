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
<body calss="wrap" style="
    flex-wrap: wrap;align-items: flex-start;
">
<h2 class="section-title">Những người bạn có thể biết</h2>
    <form style=" margin-top: -300px;" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="menu__container bd-grid">
            <?php 
                $offset = 7200;
                $sql = mysqli_query($conn, "SELECT * from users WHERE user_id = ".$_SESSION['user_id']);
                $sql3 = mysqli_query($conn, "SELECT * from friend WHERE user_id = ".$_SESSION['user_id']."");
                
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                    $sql2 = mysqli_query($conn, "SELECT * from users WHERE school = '".$row["school"]."' AND user_id != ".$_SESSION['user_id']."");
                    // echo mysqli_num_rows($sql3);
                    // echo mysqli_num_rows($sql2);
                    if (mysqli_num_rows($sql3) == 0){
                        while ($row2 = mysqli_fetch_assoc($sql2)) {
                        echo "<div class='menu__content flex-row height' id='div".$row2['user_id']."'>
                                    <div class='menu_friend'>
                                    <img class='suggest__img' src = './php/images/".$row2['img']."'>
                                    <a href='../ChatApp/show-profile.php/?id=".$row2['user_id']."' class='suggest__name'>".$row2['fname']." ".$row2['lname']."</a>
                                    </div>
                                    <input type='button' class='btn card__button suggest__button' name='friend' id='".$row2['user_id']."' value='Thêm bạn bè'>
                                    </div>";
                        }
                    }else
                    while ($row2 = mysqli_fetch_assoc($sql2)) {
                        $count = 0;
                        $sql3 = mysqli_query($conn, "SELECT * from friend WHERE user_id = ".$_SESSION['user_id']."");
                        while ($row3 = mysqli_fetch_assoc($sql3)) {
                            if ($row2['user_id'] == $row3['frn_user_id']) $count++;
                        }
                        if ($count == 0) {
                            echo "<div class='menu__content flex-row height' id='div".$row2['user_id']."'>
                                <div class='menu_friend'>
                                <img class='suggest__img' src = './php/images/".$row2['img']."'>
                                <a href='../ChatApp/show-profile.php/?id=".$row2['user_id']."' class='suggest__name'>".$row2['fname']." ".$row2['lname']."</a>
                                </div>
                                <input type='button' class='btn card__button suggest__button' name='friend' id='".$row2['user_id']."' value='Thêm bạn bè'>
                                </div>";
                           
                        }
                    }
                }
            ?>
        </div>
    </form>
</body>
<script src="javascript/suggest_friend.js"></script>
