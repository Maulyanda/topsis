<?php
include '../../controllers/topsis.php';
$db = new topsis();

$query = "SELECT max(id_kegiatan) as idMaks FROM kegiatan";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
    <h3 class="box-title">Tambah kegiatan</h3>
</div>


 <form action="" method="POST">
 <label>Kode</label>
 <input type="text" name="id_kegiatan" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
 <br />
 <label>Judul</label>
 <input type="text" name="judul_kegiatan" class="form-control"  placeholder="Masukkan judul kegiatan" >
 <br />
 <label>Kategori</label>
 <select name="kategori_kegiatan" class="form-control">
	<option value="Coaching & Conselling">Coaching & Conselling</option>
	<option value="Course">Course</option>
	<option value="Diklat">Diklat</option>
	<option value="E-learning">E-learning</option>
	<option value="Training">Training</option>
	<option value="Workshop">Workshop</option>
 </select>
 <br />
 <label>Bobot</label>
 <input type="text" name="bobot" class="form-control" placeholder="Masukkan bobot">
 <br />
 <label>Poin 1</label>
 <input type="text" name="poin1" class="form-control" placeholder="Masukkan poin">
 <br />
 <label>Poin 2</label>
 <input type="text" name="poin2" class="form-control" placeholder="Masukkan poin">
 <br />
 <label>Poin 3</label>
 <input type="text" name="poin3" class="form-control" placeholder="Masukkan poin">
 <br />
 <label>Poin 4</label>
 <input type="text" name="poin4" class="form-control" placeholder="Masukkan poin">
 <br />
 <label>Poin 5</label>
 <input type="text" name="poin5" class="form-control" placeholder="Masukkan poin">
 <br />
 <label>Sifat kegiatan</label>
 <select name="sifat" class="form-control">
	<option value="free">Free</option>
	<option value="cost">Cost</option>
 </select>
 <br />
 <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
 <br />
 </form>

<?php
if(isset($_POST['simpan'])){
	$s=mysql_query("insert into kegiatan (id_kegiatan,judul_kegiatan,kategori_kegiatan,bobot,poin1,poin2,poin3,poin4,poin5,sifat) values ('$_POST[id_kegiatan]','$_POST[judul_kegiatan]','$_POST[kategori_kegiatan]','$_POST[bobot]','$_POST[poin1]','$_POST[poin2]','$_POST[poin3]','$_POST[poin4]','$_POST[poin5]','$_POST[sifat]')");
	
	if($s){
		echo "<script>alert('Disimpan'); window.open('index.php?a=kegiatan&k=kegiatan','_self');</script>";
	}
}

?>

