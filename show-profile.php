<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="../css/style_show-profile.css">
    </head>
    <body>
        <!-- ===== HOME ===== -->
        <?php
        session_start();
        include_once "php/config.php";
        ?>
        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_GET['id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
        ?>
        <main style="margin-top:-100px"  class="main grid">
            <div class="home">
                <div class="user">
                    <div class="user__figure">
                    </div>
                    <div>
                        <img style="width: 280px;" src="../php/images/<?php echo $row['img']; ?>" alt="" class="user__img shows" color="#A29596">
                        <img style="width: 280px;" src="../php/images/<?php echo $row['img']; ?>" alt="" class="user__img" color="#111111">
                    </div>

                    <div class="user__colors">
                        <span class="user__color user__colors-one active" primary="#A29596" color="#A29596"></span>
                        <span class="user__color user__colors-two " primary="#111111" color="#111111"></span>
                    </div>
                </div>

                <!-- ===== IFORMATION ===== -->
                <div class="info">
                    <!-- ===== DATA ===== -->
                    <div class="data">
                        <span class="data__subtitle">Full Name</span>
                        <h1 class="data__title"><?php echo $row['fname']. " " . $row['lname']; ?></h1>
                        <p class="data__description"><?php echo $row['intro']; ?></p>
                    </div>

                    <!-- ===== ACTIONS ===== -->
                    <div class="actions">
                        <!-- ===== INFO ===== -->

                        <div class="quantity">
                            <h3 class="quantity__title"> <i class='bx bxs-user card__list-icon' ></i> Giới tính</h3>
                            <div class="quantity__content"> 
                                <span> <?php if ($row['gender'] == 1){
                        echo 'Male';
                    } else {
                        echo 'FeMale';
                    }
                    ?></span>
                            </div>
                        </div>
                        <div class="quantity">
                            <h3 class="quantity__title"> <i class='bx bxs-calendar-star card__list-icon'></i> BirthDay</h3>
                            <div  class="quantity__content"> 
                                <span><?php echo $row['birth']; ?></span>
                            </div>
                        </div>

                        
                    </div>
                    <div class="actions">
                    <div class="quantity">
                            <h3 class="quantity__title"> <i class='bx bxs-school card__list-icon' ></i> School</h3>
                            <div class="quantity__content"> 
                                <span>Trường  <?php echo $row['school']; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                    <div class="quantity">
                        <div class="quantity">
                            <h3 class="quantity__title">  <i class='bx bxs-envelope card__list-icon'></i> Gmail</h3>
                            <div class="quantity__content"> 
                                <span><?php echo $row['email']; ?></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>

        <!-- MAIN -->
        <script src="assets/js/show-profile.js"></script>
    </body>
</html>