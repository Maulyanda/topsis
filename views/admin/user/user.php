<head>
	<title>PT. PEGADAIAN</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
</head>

<h1>user</h1>
<ul class="nav nav-tabs">
  <?php
  if($_GET['k']=='user'){
	$act1='class="active"';
	$act2='';
  }else if($_GET['k']=='tambah'){
	$act1='';
	$act2='class="active"';
  }else{
	$act1='';
	$act2='';
  }
  ?>
  <li <?php echo $act1; ?> ><a href="index.php?a=user&k=user">Data user</a></li>
  <li <?php echo $act2; ?>><a href="index.php?a=user&k=tambah">Tambah user</a></li>
</ul>

<?php

if(@$_GET['a']=='user' and @$_GET['k']=='user'){
	include ("tampil.php");
 }else if(@$_GET['k']=='tambah'){
	include ("input.php");
 }else if(@$_GET['k']=='ubah'){
	include ("ubah.php");
 }
 ?>