<?php
include ("konfig/koneksi.php");
$s=mysql_query("select * from kegiatan");
$h=mysql_num_rows($s);


?>

<div class="box-header">
    <h3 class="box-title " >Nilai Bobot Ternormalisasi</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th colspan="<?php echo $h; ?>">kegiatan</th>
</tr>
<tr>
<?php
for($n=1;$n<=$h;$n++){
	echo"<th>C{$n}</th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from peserta");



while($da=mysql_fetch_assoc($a)){


	echo "<tr>
		<td>".(++$i)."</td>
		<td>$da[nm_peserta]</td>";
		$idalt=$da['id_peserta'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_peserta='$idalt'");
	
		while($dn=mysql_fetch_assoc($n)){
			$idk=$dn['id_kegiatan'];
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysql_query("select * from nilai_matrik where id_kegiatan='$idk' ");
			while($dkuadrat=mysql_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml peserta
			$jml_peserta=mysql_query("select * from peserta");
			$jml_a=mysql_num_rows($jml_peserta);	
			//nilai bobot kegiatan (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysql_query("select * from nilai_matrik where id_kegiatan='$idk' ");
			while($dbobot=mysql_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysql_query("select * from kegiatan where id_kegiatan='$idk'");
			$nbot=mysql_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			echo "<td align='center'>".round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3)."</td>";
			
		}
		echo "</tr>\n";

}
?>

</tbody>
</table>