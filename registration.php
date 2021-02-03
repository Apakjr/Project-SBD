<?php 
	
require 'functions.php';

	if(isset($_POST["register"]) ) {

		if ( registrasi($_POST) > 0 ){
			echo "<script>
					alert('User baru berhasil ditambahkan!');
				  </script>";
			echo "<script>
					window.location.href='login.php'
				</script";
		} else {
			echo mysqli_error($conn);
		}
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="styleregistration.css">
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
        
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="1.jpg" class="profile_image" alt="">
        <h4>Welcome</h4>
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
				<h1>Halaman Registrasi</h1><hr>
				<h3>Sudah mempunyai akun? silakan <a class="regis" href="login.php">Login</a> disini</h3>

				<div class="kotak-regis">
					<form action="" method="post">
						<p class="tulisan-regis">Silakan buat akun disini!</p>
						<label for="username" > Username :</label>
						<input type="text" name="username" id="username" class="form-regis" autocomplete="off">
						
						<label for="password" > Password :</label>
						<input type="password" name="password" id="password" class="form-regis">
							
						<label for="password2" > Konfirmasi Password :</label>
						<input type="password" name="password2" id="password2" class="form-regis">
							
						<button type="submit" name="register" class="tombol-submit">Register!</button>
					</form>
				</div>
		</div>
	</div>
	
</body>
</html>