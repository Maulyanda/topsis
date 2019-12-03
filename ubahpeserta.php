<?php

include ("konfig/koneksi.php");
$s=mysql_query("select * from peserta where id_peserta='$_GET[id]'");
$d=mysql_fetch_assoc($s);
?>
<div class="box-header">
    <h3 class="box-title">Ubah peserta</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 <label>ID</label>
 <input type="text" name="id_peserta" class="form-control" value="<?php echo $d['id_peserta']; ?>" readonly>
 <br />
 <label>Nama</label>
 <input type="text" name="nama_peserta" class="form-control"  placeholder="Masukkan nama peserta" value="<?php echo $d['nm_peserta']; ?>">
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
 <br />
 </form>
</div>
<?php
if(isset($_POST['ubah'])){
	$s=mysql_query("update peserta set nm_peserta='$_POST[nama_peserta]' where id_peserta='$_POST[id_peserta]'");
	
	if($s){
		echo "<script>alert('Diubah'); window.open('index.php?a=peserta&k=peserta','_self');</script>";
	}
}

?>

