<?php
include '../../../controllers/topsis.php';
$db = new topsis();

$db->hapus_user($_GET['id']);

if($db){
	echo "<script>window.open('../index.php?a=user&k=user','_self');</script>";
}else{
 echo $a= $db->hapus_user($_GET['id']);
}

?>