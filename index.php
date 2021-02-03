<?php
session_start();
require 'functions.php';


if ( !isset($_SESSION["login"]) ){
	echo "<script>
      alert('Anda Harus Login Terlebih Dahulu!')
      window.location.href='login.php'
		</script>";
} else {
  
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="style.css">
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
    <?php
        
    ?>
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
          <div class="main">
          <br>
          <div class="gambar"><br><br></div>
            <h2>Action Figure Shop</h2>

            <p>
              Action Figure Shop merupakan platform marketplace Action Figure Original yang dijual dengan harga lebih murah ketimbang marketplace lainnya.
              Menyediakan produk figure dari berbagai cooperation, tentunya dengan kualitas yang tidak diragukan keorisinilannya.
            </p>

            <h3>Mengapa Harus Membeli Produk Kami?</h3>

            <p>
              Produk yang kami tawarkan dijamin original, dan pastinya lebih murah ketimbang marketplace lain. Kami juga menyediakan embayaran secara COD (Cash On Delivery),
              Jadi anda tidak perlu khawatir barang tidak akan sampai atau ditipu. Anda bisa membayar ketika barang sudah sampai. <br>
              Happy Shopping :)
            </p>
          </div>
        </div>
      </div>
      <a href="halaman3.php" class="order">wkkwwk</a>
  </div>

  </body>
</html>


































































































<!---->
