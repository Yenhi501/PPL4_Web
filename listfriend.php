
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon Fontawesome-->
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.2-web (1)/fontawesome-free-6.1.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="./css/style_lfriend.css">
    <title>Bạn bè</title>
</head>
<body style=" background: #fef7f5 ">
    <h2 class="section-title">Bạn bè</h2>
    <div class="menu__container bd-grid">
        <?php
        session_start();
        include_once "php/config.php";
        $sql1 = mysqli_query($conn, "SELECT * FROM friend WHERE user_id = ".$_SESSION['user_id']."  AND status = '1'");
        while ($row = mysqli_fetch_array($sql1) )  {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = ".$row['frn_user_id']);
           while($row1 = mysqli_fetch_array($sql))
           {
            ?>
            <div class="menu__content">
                <img src="./php/images/<?php echo $row1['img']; ?>" alt="" class="menu__img">
                <h1 class="card__header-title"><?php echo $row1['fname']. " " . $row1['lname']; ?></h1>
                <span class="card__header-subtitle"><?php echo $row1['intro']; ?></span>
                <span class="menu__detail-info">
                <i class='bx bxs-user card__list-icon' ></i>
                    <?php if ($row1['gender'] == 1){
                        echo 'Male';
                    } else {
                        echo 'FeMale';
                    }
                 ?>
                 </span>
                <span style="margin-top:-6px" class="menu__detail-info"> <i class='bx bxs-school card__list-icon' ></i></i><?php echo $row1['school']; ?></span>
                <span style="margin-top:-6px" class="menu__detail-info"><i class='bx bxs-calendar-star card__list-icon'></i><?php echo $row1['birth']; ?></span>
                <span style="margin-top:-6px" class="menu__detail-info"> <i class='bx bxs-envelope card__list-icon'></i><?php echo $row1['email']; ?></span>
                
                <button  class="btn card__button"><a href="chat.php?user_id=<?php echo $row1['unique_id']; ?>">Go chat</a></button>      
               </div>
             <?php
           }
            }
        ?>
    </div>
</body>
<style>
        .menu__content{
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .menu__img{
            margin-bottom: 4px;
        }
    </style>