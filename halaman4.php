<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	echo "<script>
      alert('Anda Harus Login Terlebih Dahulu!')
      window.location.href='login.php'
		</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="style4.css">
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
			<br><br>
			<h1>About Us</h1><hr>
				<h3>Our Team</h3>
				
				<div class="box">
					<p>Crew 1</p>
					<img src="crew1.jpg">
						<div class="desc"> Achmad Farid Alfa Waid <hr> <p> Mahasiswa</p> </div>
				</div>
				<div class="box">
					<p>Crew 2</p>
					<img src="crew2.jpg">
						<div class="desc"> Fredy Dwi Alfian <hr> 
            <p> Mahasiswa</p> 
            </div>
        </div>
        <br><br><br>
        <h3>Contact Us</h3>
        <div class="contact-info">
          <div class="card">
            <i class="card-icon far fa-envelope"></i>
            <p>SBD-A05@gmail.com</p>
          </div>

          <div class="card">
            <i class="card-icon fas fa-phone"></i>
            <p>085535955889</p>
          </div>

          <div class="card">
            <i class="card-icon fas fa-map-marker-alt"></i>
            <p>Sidoarjo, Jawa Timur, Indonesia</p>
          </div>
        </div>
        <br><br><br>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>