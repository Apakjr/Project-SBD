<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "basisdata");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Username sudah terdaftar!');
				</script>";
		return false;
	}

	// untuk mengatasi username kosong
	if (empty(trim($username))){
		echo "<script>
				alert('Dimohon untuk mengisi username');
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "<script>
				alert ('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enskripsi password 
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password', '')");
	
	return mysqli_affected_rows($conn);
}

 function tambahbio ($data){
	global $conn;
	$id = $_SESSION['id'];
	$nama = htmlspecialchars( $data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$birthday = htmlspecialchars($data["birthday"]);
	$alamat = htmlspecialchars($data["alamat"]);

$query = "INSERT INTO biodata_users
		   VALUES
	   ('$id', '$nama', '$email', '$birthday', '$alamat', 'Silver')
	   ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM orderdetail WHERE
				orderid LIKE '%$keyword%' OR
				id LIKE '%$keyword%' OR
				username_user LIKE '%$keyword%' OR
				product_id LIKE '%$keyword%' OR
				product_name LIKE '%$keyword%' OR
				quantity LIKE '%$keyword%' OR
				price LIKE '%$keyword%'

			";
	return query($query);
}

function cariuser($keyword){
	$query = "SELECT * FROM users WHERE
				id LIKE '%$keyword%' OR
				username LIKE '%$keyword%' OR
				password LIKE '%$keyword%' OR
				level LIKE '%$keyword%' 
			";
	return query($query);
}

function caribio($keyword){
	$query = "SELECT * FROM biodata_users WHERE
				id LIKE '%$keyword%' OR
				nama LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				birthday LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%' OR
				status LIKE '%$keyword%' 
			";
	return query($query);
}

function ubah($data) {

	global $conn;

	$id = $data["id"];
 	$nama = htmlspecialchars( $data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$birthday = htmlspecialchars($data["birthday"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$status = htmlspecialchars($data["status"]);
	
	$query ="UPDATE biodata_users SET 
				nama = '$nama',
				email = '$email',
				birthday = '$birthday',
				alamat = '$alamat',
				status = '$status'
			WHERE id = '$id'
		";
	mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

 function hapus($id){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM orderdetail WHERE orderid = $id");
 	return mysqli_affected_rows($conn);
 }

 function hapus2($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapus3($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM biodata_users WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>