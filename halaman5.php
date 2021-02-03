<?php 
session_start();
require 'functions.php';

$id = $_SESSION['id'];

//tampilkan tabel mahasiswa_ilkom
$result=mysqli_query($conn,"SELECT * FROM biodata_users WHERE id = '$id'");
$row_query = mysqli_fetch_array($result);

$check = mysqli_query($conn, "SELECT id FROM biodata_users WHERE id = '$id'");
if ( !mysqli_fetch_assoc($check) ){
	  header("Location: biodata.php");
	  exit;		
	}


?>

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Action Figure <span>Shop</span></h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="1.jpg" class="profile_image" alt="">
        <h4>Welcome <br>
			      <?php echo $_SESSION["username"]; ?>
		    </h4>
      </center>
      <a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="halaman2.php"><i class="fas fa-table"></i><span>Gallery Figure</span></a>
      <a href="halaman3.php"><i class="fas fa-shopping-cart"></i><span>Shopping Cart</span></a>
      <a href="halaman4.php"><i class="fas fa-info-circle"></i><span>About Us</span></a>
      <a href="halaman5.php"><i class="fas fa-address-card"></i><span>Member Area</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="content_cf">
        <br><br><br><br><br>
        <div class="box">
					<p>User Info</p><hr>
						<div class="desc"> 
            <p>Nama: <b><?php echo $row_query["nama"]; ?></b></p><br>
						<p>Email: <b><?php echo $row_query["email"]; ?></b></p><br>
						<p>Birthday: <b><?php echo $row_query["birthday"]; ?></b></p><br>
						<p>Alamat: <b><?php echo $row_query["alamat"]; ?></b></p><br>
            <p>Status: <b><?php echo $row_query["status"]; ?></b></p>
						</div>
				</div>
        
            

        </div>
	  </div>
	<a href="halaman3.php" class="order">wkkwwk</a>
  </body>
</html>