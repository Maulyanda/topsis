<h1>Kegiatan</h1>
<ul class="nav nav-tabs">
  <?php
  if($_GET['k']=='kegiatan'){
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
  <li <?php echo $act1; ?> ><a href="index.php?a=kegiatan&k=kegiatan">Data kegiatan</a></li>
  <li <?php echo $act2; ?>><a href="index.php?a=kegiatan&k=tambah">Tambah kegiatan</a></li>
</ul>

<?php
if(@$_GET['a']=='kegiatan' and @$_GET['k']=='kegiatan'){
	include ("datakegiatan.php");
 }else if(@$_GET['k']=='tambah'){
	include ("tambahkegiatan.php");
 }else if(@$_GET['k']=='ubahk'){
	include ("ubahkegiatan.php");
 }
 ?>
