<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: page1.php");
  }
?>


<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Sign Up</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>

        <label for="">School</label>
        <select class="select_school " name ="school">
          <?php
           session_start();
           include_once "php/config.php";
           $sql = mysqli_query($conn, "SELECT * FROM options where type = 2 ");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
          <option> <?php echo $row['name'] ?></option>
          <?php
        }
        ?>
       </select>
        <div class="field input">
          <label>Birth Date</label>
          <input type="datetime-local" name="birth" placeholder="Enter your birth" required>
        </div>
        <label>Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
          <label class="form-check-label" for="gender">
            Male
          </label>
          <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
          <label class="form-check-label" for="gender">
            Female
          </label>
        </div>
        
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field input">
          <label>Short Introduce</label>
          <input type="text" name="intro" placeholder="Introduce yourself" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
