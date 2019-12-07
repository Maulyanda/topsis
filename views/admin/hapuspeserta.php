<?php
include '../../controllers/topsis.php';
$db = new topsis();

$s=mysql_query("delete from peserta where id_peserta='$_GET[id]' ");

if($s){
	echo "<script>window.open('index.php?a=peserta&k=peserta','_self');</script>";
}

?>