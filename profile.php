<?php 
  session_start();
  include_once "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="./css/editpro">
</head>
<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
        ?>
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="php/images/<?php echo $row['img']; ?>" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo $row['fname']. " " . $row['lname'] ?></h5>
				<h6 class="user-email"><?php echo $row['email']?></h6>
                
			</div>
            <div class="about">
				<h5>School</h5>
				<p><?php echo $row['school']; ?></p>
			</div>
			<div class="about">
				<h5>About</h5>
				<p><?php echo $row['intro']; ?></p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body form profile">
	<form style = "margin: 48px;" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="error-text"></div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" name="name"   value ="<?php echo $row['fname']. " " . $row['lname'] ?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" name="email" value="<?php echo $row['email']?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Birth Date</label>
					<input type="datetime-local" class="form-control" id="website" name="birth" value="<?php echo $row['birth']?>">
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Short Introduce</label>
					<input type="text" class="form-control" id="website" name="intro" value="<?php echo $row['intro']?>">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">School name</label>
                    <select class="form-control" id="phone" name ="school" value="<?php echo $row['school']?>">
                    <?php
                        $sql = mysqli_query($conn, "SELECT * FROM options where type = 2 ");
                        while ($row1 = mysqli_fetch_array($sql)) {
                            if($row1['name'] != $row['school']) {
                            ?>
                                <option> <?php echo $row1['name'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option selected="selected"> <?php echo $row1['name'] ?></option>
                            <?php
                            }
                        }
                        ?>
                     </select>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Select Image</label>
					<input type="file" class="form-control form-control-no-border" id="website" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
				</div>
			</div>
		</div>
		<div class="btn">
        <div class=" d-flex mt-2 button">
             <input style="margin-top: 24px;" type="submit" class="btn1 btn-dark" value="Save Profile">
         </div>
         <a style="text-decoration: none;" href="../ChatApp/users.php" >
         <div class=" d-flex mt-2 button">
             <input style="margin-top: 24px; " type="submit" class="btn1 btn-dark" value="Cancel">
         </div>
         </a>
        
        </div>
	</div>
</form>
</div>
</div>
</div>
</div>
<script src="javascript/edit-profile.js"></script>
<style type="text/css">
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #fef7f5;
    position: relative;
    height: 100%;
}
.card{
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%) !important;
}

.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #ee4957;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
    
}

.form-control-no-border{
    border: none !important;
}
.text-primary{
    color: #ee4957!important;
    margin-bottom: 18px !important;
}
.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.btn{
    display: flex;
    justify-content: flex-end;

}

.btn1{
    padding: 2px 12px !important;

}

.btn2{
    background: #fff !important;
    border: 1px solid #000 !important;
    color: #000;
    padding: 0 30px !important; 
    margin-left: 10px;
}

.btn2:hover{
    color: #000  !important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>