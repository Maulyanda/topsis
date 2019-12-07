<h1>Peserta</h1>
<ul class="nav nav-tabs">
  <?php
  if($_GET['k']=='peserta'){
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
  <li <?php echo $act1; ?> ><a href="index.php?a=peserta&k=peserta">Data peserta</a></li>
  <li <?php echo $act2; ?>><a href="index.php?a=peserta&k=tambah">Tambah peserta</a></li>
</ul>

<?php

if(@$_GET['a']=='peserta' and @$_GET['k']=='peserta'){
	include ("datakpeserta.php");
 }else if(@$_GET['k']=='tambah'){
	include ("tambahpeserta.php");
 }else if(@$_GET['k']=='ubaha'){
	include ("ubahpeserta.php");
 }
 ?>
