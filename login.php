<!DOCTYPE html>
<html>
<head>
	<title>PT. PEGADAIAN</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

	<br/>
	<br/>
	<center><h2>TOPSIS</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="cek_login.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" placeholder="Masukkan username"/>
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" placeholder="Masukkan password"/>
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
				<a href="index.php" class="btn btn-info" role="button">Kembali</a>
			</div>

			<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "Username atau password salah!";
				}else if($_GET['pesan'] == "logout"){
					echo "Anda telah berhasil logout";
				}else if($_GET['pesan'] == "belum_login"){
					echo "Anda harus login untuk mengakses halaman admin";
				}
			}
			?>
		</form>
	</div>
</body>
 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>
</html>