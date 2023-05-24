<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: page1.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>
<?php include_once "header.php"; ?>
<img style="width:500px; margin-left:-100px" src="https://scontent.fdad3-5.fna.fbcdn.net/v/t39.30808-6/322471995_879184306557026_5188822363831688110_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=dbeb18&_nc_ohc=ye2hZQ9Z0P0AX9GZImD&tn=TJtah7AmahFdy2cX&_nc_ht=scontent.fdad3-5.fna&oh=00_AfA63JrX4LrTHVu9SulYW4LRHmaa7EJZapHyggG0BDkwSg&oe=63AFB9CD" alt="">
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Login  <a style="color: #000; font-size:1rem; margin-left:300px" href="./index.php"><i class='bx bx-arrow-back'></i></a></header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
