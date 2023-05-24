<?php 
  session_start();
  include_once "php/config.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.2-web (1)/fontawesome-free-6.1.2-web/css/all.min.css">
        <link rel="stylesheet" href="./css/styles1.css">
        <link rel="stylesheet" href="./css/style_show-profile.css">
        <style>
            .header__user{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .header__user-ava{
                width : 30px;
                height : 30px;
                border-radius : 50%;
            }
            .header__user-name{
                margin-left: 8px;
            }
        </style>
        <title>Page 1</title>
    </head>
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">
                <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
             ?>
                <a href="#" class="header__logo"><img src="./php/images/318966911_527617809326165_3931593626088157936_n.png" style="margin-left:-15px; height:120px; margin-top:8px" alt=""></a>
                <div class="header__user">
                <img class="header__user-ava" src="php/images/<?php echo $row['img']; ?>" alt="">
                <a href="../ChatApp/show-profile.php/?id=<?php echo $row['user_id']; ?>" target="mainbody" style="color:#000">
                <h5 class="header__user-name"><?php echo $row['fname']. " " . $row['lname'] ?></h5>
                </a>
               
                </div>
            </div>
        </header>

        <iframe src="../ChatApp/users.php" name="mainbody" width="100%" height="905" style="border:none;">
        </iframe>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class="fa-solid fa-heart nav__icon-header"></i>
                        <span class="nav__logo-name">Food&Love</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>
    
                            <a href="../ChatApp/users.php" target="mainbody"  class="nav__link">
                                <i class='bx bx-home nav__icon' ></i>
                                <span class="nav__name">Trang chủ</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name">Thông tin cá nhân</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="../ChatApp/profile.php" target="mainbody" class="nav__dropdown-item">Chỉnh sửa</a>
                                    </div>
                                </div>
                            </div>

                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>
                            <a href="../ChatApp/users.php" target="mainbody" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Messages</span>
                            </a>
                            <a href="../ChatApp/listfriend.php" target="mainbody"  class="nav__link">
                                <i class='bx bx-face nav__icon'></i>
                                <span class="nav__name">Bạn bè</a></span>
                            </a>

                            <a href="../ChatApp/food.php" target="mainbody" class="nav__link">
                                <i class='bx bx-file-find nav__icon'></i>
                                <span class="nav__name">Tìm người đi ăn</span>
                            </a>

                            <a href="../ChatApp/suggestFriend.php" target="mainbody" class="nav__link">
                            <i class='bx bx-edit-alt nav__icon'></i>
                                <span class="nav__name">Gợi ý kết bạn</span>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <!--========== MAIN JS ==========-->
    </body>
</html>