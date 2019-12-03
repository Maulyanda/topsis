<?php
include ("konfig/koneksi.php");

$s=mysql_query("delete from peserta where id_peserta='$_GET[id]' ");

if($s){
	echo "<script>window.open('index.php?a=peserta&k=peserta','_self');</script>";
}

?>