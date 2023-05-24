<?php
include_once "config.php";

function add_food($food_id, $food_name, $food_img, $Mota)
{
  global $conn;

  // Chống SQL Injection
  $food_id = addslashes($food_id);
  $food_name = addslashes($food_name);
  $Mota = addslashes($Mota);


  $sql = "INSERT INTO food(food_id, food_name,food_img, Mota) VALUES ('$food_id','$food_name', '$food_img','$Mota')";
  $query = mysqli_query($conn, $sql);

  return $query;
}

if (!empty($_POST['submit'])) {
  $data['food_id'] = isset($_POST['food_id']) ? $_POST['food_id'] : '';
  $data['food_name'] = isset($_POST['food_name']) ? $_POST['food_name'] : '';
  $data['Mota'] = isset($_POST['Mota']) ? $_POST['Mota'] : '';

  if (isset($_FILES['image'])) {
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $img_explode = explode('.', $img_name);
    $img_ext = end($img_explode);

    $extensions = ["jpeg", "png", "jpg"];
    if (in_array($img_ext, $extensions) === true) {
      $types = ["image/jpeg", "image/jpg", "image/png"];
      if (in_array($img_type, $types) === true) {
        $time = time();
        $new_img_name = $time . $img_name;
      } else {
        echo "Please upload an image file - jpeg, png, jpg";
      }
    }
  }
}

$errors = array();
if (empty($data['food_id'])) {
  $errors['food_id'] = 'chưa nhập ID';
}

$errors = array();
if (empty($data['food_name'])) {
  $errors['food_name'] = 'chưa nhập tên';
}
$errors = array();
if (empty($data['Mota'])) {
  $errors['Mota'] = 'chưa nhập mô tả';
}

if (!$errors) {
  if (move_uploaded_file($tmp_name, "images_food/" . $new_img_name)) {
    add_food($data['food_id'], $data['food_name'], $new_img_name, $data['Mota']);
    header("location: ../showfood.php");
  }
}

?>