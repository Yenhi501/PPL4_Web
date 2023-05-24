<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Icon Fontawesome-->
<link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.2-web (1)/fontawesome-free-6.1.2-web/css/all.min.css">

<!--========== CSS ==========-->
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/styles2.css">

<title>FIsL</title>

<head>
    <stype>

    </stype>
</head>
<a style="background-color: #fff;padding: 0px 3px; margin-left: 6px; margin-top: 10px" href="./menuAdmin.php"><i class='bx bx-arrow-back'></i></a>
<h2  class="color">Danh Sách Món Ăn </h2>
<form action='./php/delete-food.php' method='post'>
    <div class="menu__container bd-grid">
        <?php
        include_once "php/config.php";
        $sql = "SELECT * from food";
        $rs = mysqli_query($conn, $sql);

        ?>

        <?php while ($row = mysqli_fetch_array($rs)) { ?>
            <tr>
                <div class="menu__content bgr-color">
                    <img src="php/images_food/<?php echo $row['food_img']; ?>" alt="" class="menu__img">
                    <h3 class="menu__name"><?php echo $row['food_name']; ?></h3>
                    <span class="menu__detail"><?php echo $row['Mota']; ?></span>
                    <td><input type='checkbox' name='<?php echo  $row['food_id']; ?>' value='<?php echo  $row['food_id']; ?>'></td>
                </div>
            <?php } ?>
            <div class="inputs">
                <input type="submit" value="Xoa tat ca" name="submit">
                
            </div>
    </div>
    </div>
</form>