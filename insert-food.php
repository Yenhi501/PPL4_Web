<?php
include_once "php/config.php";
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="style-food" href="demo.css">
  <link rel="stylesheet" href="assets/css/styles2.css">
</head>

<body>
<!-- C:\xampp\htdocs\ppl4\ppl4\ChatApp\php\insert-food.php -->
  <div class="container">
  <form  action="./php/insert-food.php" id="insert-food"  method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="header">
        <h3 style="color: #000">Thêm món ăn</h3>
      </div>
      <div class="sep"></div>
      <div class="inputs">
        <!-- <label><b>ID món ăn<b></label>
        <input type="text" name="food_id" placeholder="Nhập ID món ăn" required> --> 
        <label><b>Tên món ăn<b></label>
        <input type="text" name="food_name" placeholder="Nhập tên món ăn" required>
        <label><b>Giới thiệu món ăn<b></label>
        <input type="text" name="Mota" placeholder="Nhập giới thiệu món ăn" required>
      </div>
      <div class="inputs">
        <label><b>Select Image<b></label>
        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
      </div>
      <div class="inputs">
        <input type="submit" name="submit" value="Thêm">
      </div>
      <a style="color: #000" href="./menuAdmin.php"><i class='bx bx-arrow-back'></i></a>
    </form>
  </div>
  


</body>

</html>