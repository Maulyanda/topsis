<?php
include '../../../controllers/topsis.php';
$db = new topsis();

$db->hapus_kriteria($_GET['id']);

if($db){
	echo "<script>window.open('../index.php?a=kriteria&k=kriteria','_self');</script>";
}else{
 echo $a= $db->hapus_kriteria($_GET['id']); 
}

?>