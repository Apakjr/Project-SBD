<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data pesanan  berdasarkan idnya
$biodata = query("SELECT * FROM biodata_users WHERE id = $id")[0];


if (isset($_POST["submit"]) ){

	
	if (ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = 'biodatauser.php';
			</script>
		";
	} else {
		echo("\n \n \n \n \n \n");
		echo ("Error description:" .$conn -> error);
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
      <a href="admin.php"><i class="fas fa-address-card"></i><span>Daftar Pesanan User</span></a>
      <a href="akunuser.php"><i class="fas fa-address-card"></i><span>Daftar Akun User</span></a>
      <a href="biodatauser.php"><i class="fas fa-address-card"></i><span>Daftar Biodata User</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="content_cf">
			<br><br><br>

				<form action="" method="post" enctype="multipart/form-data">
	
					<input type="hidden" name="id" value="<?= $biodata["id"]; ?>">
				
					<input type="text" name="nama" id="nama"
					required="required" class="form-order" value="<?php echo $biodata["nama"]; ?>" >
					
					<input type="text" name="email" id="email"
					required="required" class="form-order" value="<?php echo $biodata["email"]; ?>">

					<input type="text" name="birthday" id="birthday"
					required="required" class="form-order" value="<?php echo $biodata["birthday"]; ?>">

					<input type="text" name="alamat" id="alamat"
					required="required" class="form-order" value="<?php echo $biodata["alamat"]; ?>">

          <input type="text" name="status" id="status"
					required="required" class="form-order" value="<?php echo $biodata["status"]; ?>">
					
					<button type="submit" name="submit" class="tombol-submit">Perbaiki</button>
					
				</form>

		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>