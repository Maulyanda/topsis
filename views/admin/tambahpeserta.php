<?php
include '../../controllers/topsis.php';
$db = new topsis();

$query = "SELECT max(id_peserta) as idMaks FROM peserta";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "al";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
    <h3 class="box-title">Tambah peserta</h3>
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
 	<input type="text" name="id_peserta" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
 <br />
 <label>Nama</label>
 	<input type="text" name="nama_peserta" class="form-control"  placeholder="Masukkan nama peserta" required>
 <br />
 <label>Judul Kegiatan</label>
 	<input type="text" name="judul" class="form-control"  placeholder="Masukkan judul kegiatan" required>
 <br />
 <label>Tanggal</label>
 	<input type="text" name="tanggal" class="form-control input-tanggal" placeholder="Tanggal" required>
 <br />
 	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
 <br />
 </form>
</div>
<?php
if(isset($_POST['simpan'])){
	$s=mysql_query("insert into peserta (id_peserta,nm_peserta,judul,tanggal) values('$_POST[id_peserta]','$_POST[nama_peserta]','$_POST[judul]','$_POST[tanggal]')");
	
	if($s){
		echo "<script>alert('Disimpan'); window.open('index.php?a=peserta&k=peserta','_self');</script>";
	}
}

?>

