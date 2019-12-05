<!DOCTYPE html>
<html lang="en">
<head>
  <title>PT PEGADAIAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'konfig/koneksi.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");
}
 
// menampilkan pesan selamat datang

 
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PT PEGADAIAN</a>
    </div>
	
	<!--
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
	-->
	
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#"><?php echo "Hai, selamat datang ". $_SESSION['username'];?></li></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>
 <?php
if(@$_GET['a']=='kegiatan'){
	$active1='class="active"';
	$active2='';
	$active3='';
	$active4='';
}else if(@$_GET['a']=='peserta'){
	$active1='';
	$active2='class="active"';
	$active3='';
	$active4='';
}else if(@$_GET['a']=='nilaimatrik'){
	$active1='';
	$active2='';
	$active3='class="active"';
	$active4='';
}else if(@$_GET['a']=='hasiltopsis'){
	$active1='';
	$active2='';
	$active3='';
	$active4='class="active"';
}else{
	$active1='';
	$active2='';
	$active3='';
	$active4='';
}	

?> 
  
<!-- TAB KIRI -->
<div class="col-sm-2">
<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="index.php">Home</a></li> 
  <li <?php echo $active1 ?>><a href="?a=kegiatan&k=kegiatan" >Kegiatan</a></li>
  <li <?php echo $active2 ?>><a href="?a=peserta&k=peserta" >Peserta</a></li>
  <li <?php echo $active3 ?>><a href="?a=nilaimatrik" >Nilai Peserta</a></li>
  <li <?php echo $active4 ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
</ul>  
</div>
<!-- /TAB KIRI -->  
  
  

  <div class="col-sm-10">
 <?php
 
 if(@$_GET['a']=='kegiatan'){
	include ("kegiatan.php");
 }else if(@$_GET['a']=='peserta'){
	include ("peserta.php");
 }else if(@$_GET['a']=='nilaimatrik'){
	include ("nilaimatrik.php");
 }else if(@$_GET['a']=='hasiltopsis'){
	include ("hasiltopsis.php");
 }

 ?>

</div>

</body>
</html>
