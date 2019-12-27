<?php
include '../../../controllers/topsis.php';
$db = new topsis();

$db->hapus_peserta($_GET['id']);

if($db){
	echo "<script>window.open('../index.php?a=peserta&k=peserta','_self');</script>";
}

?>