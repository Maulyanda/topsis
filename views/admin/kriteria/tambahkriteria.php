<?php
include '../../controllers/topsis.php';
$db = new topsis();

$query = "SELECT max(id_kriteria) as idMaks FROM kriteria";
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

<head>
	<title>PT. PEGADAIAN</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
</head>

<div class="box-header">
    <h3 class="box-title">Tambah kriteria</h3>
</div>


 <form action="" method="POST">
 <label>Kode</label>
 <input type="text" name="id_kriteria" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
 <br />
 <label>Kriteria</label>
 <input type="text" name="kriteria" class="form-control"  placeholder="Masukkan kriteria" >
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
 <label>Sifat kriteria</label>
 <select name="sifat" class="form-control">
	<option value="benefit">Benefit</option>
	<option value="cost">Cost</option>
 </select>
 <br />
 <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
 <br />
 </form>

<?php
if(isset($_POST['simpan'])){
	$db->tambah_kriteria($_POST['id_kriteria'],$_POST['kriteria'],$_POST['bobot'],$_POST['poin1'],$_POST['poin2'],$_POST['poin3'],$_POST['poin4'],$_POST['poin5'],$_POST['sifat']);
	
	if($db){
		echo "<script>alert('Disimpan'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>

