<?php
include '../../controllers/topsis.php';
$db = new topsis();
$h = $db->kriteria();
?>

<div class="box-header">
    <h3 class="box-title " >Matriks Ideal Positif (A<sup>+</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th colspan="<?php echo $h; ?>">kriteria</th>
</tr>
<tr>
<?php
$hk=mysql_query("select id_kriteria from kriteria");
while($dhk=mysql_fetch_assoc($hk)){

	echo"<th>$dhk[id_kriteria]</th>";
}
?>
</tr>
<tr>
<?php

for($n=1;$n<=$h;$n++){

	echo"<th>y<sub>$n</sub><sup>+</sup></th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from kriteria");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){

	
		
		$idalt=$da['id_kriteria'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_kriteria='$idalt'");
		
		$c=0;
		$ymax=array();
		while($dn=mysql_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysql_query("select * from nilai_matrik where id_kriteria='$idk' ");
			while($dkuadrat=mysql_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml peserta
			$jml_peserta=mysql_query("select * from peserta");
			$jml_a=mysql_num_rows($jml_peserta);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk' ");
			while($dbobot=mysql_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk'");
			$nbot=mysql_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

				$ymax[$c]=$v;
				$c++;
		}
		
		echo "<td>".max($ymax)."</td>";
		
		

}
echo "</tr>";
?>

</tbody>
</table>

<!-- tabel min -->

<div class="box-header">
    <h3 class="box-title " >Matriks Ideal Positif (A<sup>-</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th colspan="<?php echo $h; ?>">kriteria</th>
</tr>
<tr>
<?php
$hk=mysql_query("select id_kriteria from kriteria");
while($dhk=mysql_fetch_assoc($hk)){

	echo"<th>$dhk[id_kriteria]</th>";
}
?>
</tr>
<tr>
<?php

for($n=1;$n<=$h;$n++){

	echo"<th>y<sub>$n</sub><sup>-</sup></th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from kriteria");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){

	
		
		$idalt=$da['id_kriteria'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_kriteria='$idalt'");
		
		$c=0;
		$ymax=array();
		while($dn=mysql_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysql_query("select * from nilai_matrik where id_kriteria='$idk' ");
			while($dkuadrat=mysql_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml peserta
			$jml_peserta=mysql_query("select * from peserta");
			$jml_a=mysql_num_rows($jml_peserta);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk' ");
			while($dbobot=mysql_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk'");
			$nbot=mysql_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

				$ymax[$c]=$v;
				$c++;
		}
		
		echo "<td>".min($ymax)."</td>";
		
		

}
echo "</tr>";
?>

</tbody>
</table>
