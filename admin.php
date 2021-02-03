<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	echo "<script>
			alert('Anda Harus Login Terlebih Dahulu!')
		</script>";
	echo "<script>
			window.location.href='login.php'
		</script";
}

$pesanan = query("SELECT * FROM orderdetail ORDER BY orderid ASC");
//untuk mencari data
if (isset($_POST["cari"])){
	$pesanan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Action Figure Shop</title>
    <link rel="stylesheet" href="admin.css">
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
			
				<br>
				<h1>Data Pesanan User</h1> <hr>

				<form action="" method="post">
					<input type="text" name="keyword" size="50" class="key" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
					<button type="submit" name="cari" class="cari_btn">Cari</button>
				</form>
				<br>

				<table border="1" cellpadding="10" cellspacing="0" class="tablee">
	
					<tr>
						<th>Id Order</th>
						<th>Aksi</th>
						<th>Id Pemesan</th>
						<th>Username Pemesan</th>
						<th>Id Product</th>
						<th>Product</th>
						<th>Qantity</th>
						<th>Price</th>
					</tr>

					<?php $i = 1; ?>
					<?php foreach ( $pesanan as $row)  : ?>
					<tr>
						<td><?php echo $row["orderid"];  ?></td>
						<td>
							<a href="hapus.php?id=<?php echo $row["orderid"]; ?>" onclick="return confirm('yakin?')" class="hapus_btn">Hapus</a>
						</td>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["username_user"]; ?></td>
						<td><?php echo $row["product_id"]; ?></td>
						<td><?php echo $row["product_name"]; ?></td>
						<td><?php echo $row["quantity"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>