<!DOCTYPE html>
<html lang="en">
<head>
  <title>PT PEGADAIAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../../login.php?pesan=belum_login");
}
 
// menampilkan pesan selamat datang
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PT PEGADAIAN</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#"><?php echo "Hai, selamat datang ". $_SESSION['username'];?></li></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>
 <?php
if(@$_GET['a']=='kriteria'){
	$active1='class="active"';
	$active2='';
	$active3='';
	$active4='';
	$active5='';
}else if(@$_GET['a']=='peserta'){
	$active1='';
	$active2='class="active"';
	$active3='';
	$active4='';
	$active5='';
}else if(@$_GET['a']=='nilaimatrik'){
	$active1='';
	$active2='';
	$active3='class="active"';
	$active4='';
	$active5='';
}else if(@$_GET['a']=='hasiltopsis'){
	$active1='';
	$active2='';
	$active3='';
	$active4='class="active"';
	$active5='';
}else if(@$_GET['a']=='user'){
	$active1='';
	$active2='';
	$active3='';
	$active4='';
	$active5='class="active"';
}else{
	$active1='';
	$active2='';
	$active3='';
	$active4='';
	$active5='';
}	

?> 

<!-- TAB KIRI -->
<div class="col-sm-2">
<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="?a=home">Home</a></li> 
  <li <?php echo $active1 ?>><a href="?a=kriteria&k=kriteria">kriteria</a></li>
  <li <?php echo $active2 ?>><a href="?a=peserta&k=peserta">Peserta</a></li>
  <li <?php echo $active3 ?>><a href="?a=nilaimatrik">Nilai Peserta</a></li>
  <li <?php echo $active4 ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
  <li <?php echo $active5 ?>><a href="?a=user&k=user">User</a></li>
</ul>  
</div>
<!-- /TAB KIRI -->  

  <div class="col-sm-10">
 <?php
  if(@$_GET['a']=='home'){
		include ("home.php");
	}else if(@$_GET['a']=='kriteria'){
		include ("kriteria/kriteria.php");
 	}else if(@$_GET['a']=='peserta'){
		include ("peserta/peserta.php");
 	}else if(@$_GET['a']=='nilaimatrik'){
		include ("matriks/nilaimatrik.php");
 	}else if(@$_GET['a']=='hasiltopsis'){
		include ("penilaian/hasiltopsis.php");
	}else if(@$_GET['a']=='user'){
		include ("user/user.php");
 }
 ?>

</div>

</body>
</html>
