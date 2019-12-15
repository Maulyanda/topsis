<?php
include '../../controllers/topsis.php';
$db = new topsis();

$s=mysql_query("select * from peserta where id_peserta='$_GET[id]'");
$d=mysql_fetch_assoc($s);
?>
<div class="box-header">
    <h3 class="box-title">Ubah peserta</h3>
</div>

<!-- <script src="../../assets/datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../../assets/datepicker/css/datepicker.css">
<script>
	$(function () {
		$('#datepicker').datepicker({
		autoclose: true
		});
	});
</script> -->

<script type="text/javascript" src="../../assets/jquery/jquery.js"></script>
<script type="text/javascript" src="../../assets/jquery/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/jquery/jquery-ui.css">

<script type="text/javascript">
	$(document).ready(function(){
		$('.input-tanggal').datepicker();		
	});
</script>

<div class="box-body pad">
 <form action="" method="POST">
 <label>ID</label>
 	<input type="text" name="id_peserta" class="form-control" value="<?php echo $d['id_peserta']; ?>" readonly>
 <br />
 <label>Nama</label>
 	<input type="text" name="nama_peserta" class="form-control"  placeholder="Masukkan nama peserta" value="<?php echo $d['nm_peserta']; ?>" required>
 <br />
 <label>Judul Kegiatan</label>
 	<input type="text" name="judul" class="form-control"  placeholder="Masukkan Judul Kegiatan" value="<?php echo $d['judul']; ?>" required>
 <br />
 <label>Tanggal</label>
 	<input type="text" id="datepicker" name="tanggal" class="form-control input-tanggal" placeholder="Tanggal" value="<?php echo $d['tanggal']; ?>" required>
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
 <br />
 </form>
</div>
<?php
if(isset($_POST['ubah'])){
	$s=mysql_query("update peserta set nm_peserta='$_POST[nama_peserta]', judul='$_POST[judul]', tanggal='$_POST[tanggal]' where id_peserta='$_POST[id_peserta]'");
	
	if($s){
		echo "<script>alert('Diubah'); window.open('index.php?a=peserta&k=peserta','_self');</script>";
	}
}

?>

