<h1>Nilai peserta</h1>
<ul class="nav nav-tabs">
  
  <li class="active" ><a href="index.php?a=kegiatan&k=kegiatan">Isi Nilai Peserta</a></li>
  
</ul>
<div class="box-header">
    <h3 class="box-title">Tambah Nilai Peserta</h3>
</div>


<form method="POST" action="">
<div class="form-group">
	<label class="control-label col-lg-2">Peserta</label>
		<div class="col-lg-4">
			<select name="id_alt" class="form-control">
				<?php
					include '../../controllers/topsis.php';
					$db = new topsis();
					$s=mysql_query("select * from peserta");
					while($d=mysql_fetch_assoc($s)){
				?>			
				<option value="<?php echo $d['id_peserta'] ?>"><?php echo $d['id_peserta']." | ".$d['nm_peserta'] ?></option>
				<?php
				}
				?>
			</select>											
		</div>
</div>
<br />
<hr />

<div class="form-group">
	<?php
		$i=1;
		$alt=mysql_query("select * from kegiatan");
		//hitung jml kegiatan		
		$jml_krit=mysql_num_rows($alt);
		while($dalt=mysql_fetch_assoc($alt)){
	?>
						
	<table   align="left">
		<tr>
		<td width="200" >
			<label ><?php echo $dalt['judul_kegiatan']; ?></label>
			<input type="hidden" name="id_kegiatan<?php echo $i; ?>" value="<?php echo $dalt['id_kegiatan']; ?>" />
		</td>					
		<div class="col-md-8">
		<td width="80">					
			<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin1']; ?>" /><?php echo $dalt['poin1']; ?>
		</td>
		<td width="80">					
			<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin2']; ?>"/><?php echo $dalt['poin2']; ?>
		</td>
		<td width="80">					
			<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin3']; ?>"/><?php echo $dalt['poin3']; ?>
		</td>
		<td width="80">					
			<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin4']; ?>"/><?php echo $dalt['poin4']; ?>
		</td>	
		<td width="80">					
			<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin5']; ?>"/><?php echo $dalt['poin5']; ?>
		</td>
		</tr>	
		
		<?php
			$i++;
		}
		?>
		
		<tr>
		<td colspan=5 align="center">
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		</td>
		</tr>

	</table>		
		</div>					
</div>
						
						
</form>						
<?php
$b=mysql_query("select * from kegiatan");
$c=mysql_fetch_assoc($b);

if(isset($_POST['simpan'])){
 
$o=1;

//cek id peserta
$id_alt=$_POST['id_alt'];
$cek=mysql_query("select * from peserta where id_peserta='$id_alt'");
$cek_l=mysql_num_rows($cek);
if($cek_l>0){
	$del=mysql_query("delete from nilai_matrik where id_peserta='$id_alt'");
}

for($n=1;$n<=$jml_krit;$n++){
	$id_k=$_POST['id_kegiatan'.$o];
	 $nilai_k=$_POST['nilai'.$o];
	
	
	$m=mysql_query("insert into nilai_matrik (id_peserta,id_kegiatan,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");
	
	$o++;
}

}
?>			

			