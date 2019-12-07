<?php
include '../../controllers/topsis.php';
$db = new topsis();

$s=mysql_query("delete from kegiatan where id_kegiatan='$_GET[id]'");

if($s){
	echo "<script>window.open('index.php?a=kegiatan&k=kegiatan','_self');</script>";
}else{
 echo $a="delete from kegiatan where id_kegiatan='$_GET[id]'";
}

?>