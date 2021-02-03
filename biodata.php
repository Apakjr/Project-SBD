<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	echo "<script>
      alert('Anda Harus Login Terlebih Dahulu!')
      window.location.href='login.php'
		</script>";
}
$conn = mysqli_connect("localhost", "root", "", "basisdata");

if (isset($_POST["submit"])){
	
	if (tambahbio($_POST) > 0 ) {
    $_SESSION["submit"] = true;
		echo "
			<script>
				alert('Biodata Anda Berhasil Diproses!');
				document.location.href = 'halaman5.php';
			</script>
		";
	} else {
		echo "	
			<script>
				alert('Biodata Anda Gagal Diproses!');
				document.location.href = 'biodata.php';
			</script>
		";
	}

 }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="biodata.css">
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
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<p class="tulisan-pesanan">Silakan Isi Biodata Diri Anda!</p>
					<input type="text" name="nama" id="nama"
					required="required" autofocus placeholder="Nama / Username Anda" autocomplete="off" class="form-order">
				
					<input type="text" name="email" id="email"
					required="required" autofocus placeholder="Alamat Email Anda" class="form-order">
			
					<input type="text" name="birthday" id="birthday"
					required="required" autofocus placeholder="Tanggal Lahir Anda" class="form-order">
				
					<input type="text" name="alamat" id="alamat"
					required="required" autofocus placeholder="Alamat Rumah Anda" class="form-order">
			
					<button type="submit" name="submit" class="tombol-submit">Submit</button>
		
			</form>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>