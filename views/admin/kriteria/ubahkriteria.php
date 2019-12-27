<?php
include '../../controllers/topsis.php';
$db = new topsis();
?>

<head>
	<title>PT. PEGADAIAN</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
</head>

<div class="box-header">
    <h3 class="box-title">Ubah kriteria</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 <?php
    foreach($db->edit_kriteria($_GET['id']) as $d){
 ?>
 <label>Kode</label>
 <input type="text" name="id_kriteria" class="form-control" value="<?php echo $d['id_kriteria']; ?>" readonly>
 <br />
 <label>Kriteria</label>
 <input type="text" name="kriteria" class="form-control"  placeholder="Masukkan kriteria" value="<?php echo $d['kriteria']; ?>" >
 <br />
 <label>Bobot</label>
 <input type="text" name="bobot" class="form-control" placeholder="Bobot" value="<?php echo $d['bobot']; ?>">
 <br />
 <label>Poin 1</label>
 <input type="text" name="poin1" class="form-control" placeholder="Masukkan poin" value="<?php echo $d['poin1']; ?>">
 <br />
 <label>Poin 2</label>
 <input type="text" name="poin2" class="form-control" placeholder="Masukkan poin" value="<?php echo $d['poin2']; ?>">
 <br />
 <label>Poin 3</label>
 <input type="text" name="poin3" class="form-control" placeholder="Masukkan poin" value="<?php echo $d['poin3']; ?>">
 <br />
 <label>Poin 4</label>
 <input type="text" name="poin4" class="form-control" placeholder="Masukkan poin" value="<?php echo $d['poin4']; ?>">
 <br />
 <label>Poin 5</label>
 <input type="text" name="poin5" class="form-control" placeholder="Masukkan poin" value="<?php echo $d['poin5']; ?>">
 <br />
 <label>Sifat kriteria</label>
 <select name="sifat" class="form-control">
	<option value="<?php echo $d['sifat']; ?>"><?php echo $d['sifat']; ?></option>
	<option value="benefit">Benefit</option>
	<option value="cost">Cost</option>
 </select>
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
 <br />
 <?php } ?>
 </form>
</div>
<?php
if(isset($_POST['ubah'])){
	$db->update_kriteria($_POST['kriteria'], $_POST['bobot'], $_POST['poin1'], $_POST['poin2'], $_POST['poin3'], $_POST['poin4'], $_POST['poin5'], $_POST['sifat']);
	//$s=mysql_query("update kriteria set kriteria='$_POST[kriteria]', bobot='$_POST[bobot]', poin1='$_POST[poin1]',poin2='$_POST[poin2]', poin3='$_POST[poin3]', poin4='$_POST[poin4]', poin5='$_POST[poin5]', sifat='$_POST[sifat]' where id_kriteria='$_POST[id_kriteria]'");
	
	if($db){
		echo "<script>alert('Diubah'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>

