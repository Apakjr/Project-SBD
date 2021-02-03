<?php
session_start();
require 'functions.php';

//cek cookie
if ( isset($_COOKIE['login']) ){
	if ( $_COOKIE['login'] == 'true' ){
		$_SESSION['login'] = true;
	}
}

if ( isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit;
}


	if ( isset($_POST["login"]) ){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

		// cek username 
		if ( mysqli_num_rows($result) === 1 ){

			// cek password
			$row = mysqli_fetch_assoc($result);
			if ( password_verify($password, $row["password"]) ){
				//set session
				$_SESSION["login"] = true;

				//cek remember me
				if ( isset($_POST['remember']) ){
					//buat cookie
					setcookie('login', 'true', time()+60);
				}

				//cek admin atau bukan
				if ( $row['level'] == "admin"){
					$_SESSION['username'] = $username;
					$_SESSION['level'] = "admin";
					header("Location: admin.php");
					exit;
				} else{
					$_SESSION['username'] = $username;
					$_SESSION['id'] = $row["id"];
					header("Location: index.php");
					exit;
				}
			} 
		}

		$error = true;
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="stylelogin.css">
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
				<h1>Halaman Login</h1><hr>
				<h3>Belum mempunyai akun? Silakan <a class="regis" href="registration.php">REGISTRASI</a> disini!</h3>

				<?php if( isset($error)) : ?>
					<p class="alert">Username / Password salah</p>
					<?php echo mysqli_error($conn); ?>
				<?php endif; ?>
				
				<div class="kotak-login">
					<p class="tulisan-login">Silakan Login</p>

					<form action="" method="post">
						<label for="username">Username :</label>
						<input type="text" name="username" id="username" class="form-login" autocomplete="off">
				
						<label for="password">Password :</label>
						<input type="password" name="password" id="password" class="form-login">
							
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember me</label>
					
						<button type="submit" name="login" class="tombol-login">Login</button>
					</form>			
				</div>
		</div>
	</div>
	
</body>
</html>