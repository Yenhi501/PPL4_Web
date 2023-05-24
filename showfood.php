<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon Fontawesome-->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.2-web (1)/fontawesome-free-6.1.2-web/css/all.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styles2.css">

    <title>FIsL</title>
</head>

<body>
<a style="background-color: #fff;padding: 0px 3px; margin-left: 6px; margin-top: 10px" href="./menuAdmin.php"><i class='bx bx-arrow-back'></i></a>
    <h2 class="color">Danh Sách Món Ăn </h2>
    <div class="menu__container bd-grid">
        <?php
        session_start();
        include_once "php/config.php";
        $sql = mysqli_query($conn, "SELECT * FROM food ");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <div class="menu__content bgr-color">
                <img src="php/images_food/<?php echo $row['food_img']; ?>" alt="" class="menu__img">
                <h3 class="menu__name"><?php echo $row['food_name']; ?></h3>
                <span class="menu__detail"><?php echo $row['Mota']; ?></span>
            </div>
        <?php
        }
        ?>
    </div>

</body>