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
    <link rel="stylesheet" href="style2.css">
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
			<div class="main">
				<br><br>
        <h1>Checkout!</h1>
        <p>Pesanan Anda akan diproses, hubungi penjual di halaman About Us untuk mendapatkan contact penjual.</p>
      </div>
            <?php
			if(!empty($_SESSION["shopping_cart"]))
					{
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                            $id_user = $_SESSION['id'];
                            $username_user = $_SESSION['username'];
                            $id_product = $values["item_id"];
                            $name_product = $values["item_name"];
                            $quantity = $values["item_quantity"];
                            $total = $values["item_quantity"] * $values["item_price"];
                            $conn = mysqli_connect("localhost", "root", "", "basisdata");
                            // Check connection
                            if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "INSERT INTO orderdetail VALUES ('','$id_user','$username_user','$id_product','$name_product','$quantity','$total')";
                            mysqli_query($conn, $sql);
                            mysqli_close($conn);
                    ?>
					<?php
						}
					?>
					
					<?php
					}
					?>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>