<?php
//session_start();
include '../../controllers/topsis.php';
$db = new topsis();
$h = $db->kriteria();
?>

<div class="box-header">
    <h3 class="box-title " >Jarak Solusi Ideal Positif (D<sup>+</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th >Nomor</th>
<th >Nama</th>
<th >D<sup>+</sup></th>
</tr>

</thead>
<tbody>
<?php
//buat array kolom

$i2=1;
$i3=0;
$maxarray=array();
$a2=mysql_query("select * from kriteria");
echo "<tr>";
while($da2=mysql_fetch_assoc($a2)){
		
		$idalt2=$da2['id_kriteria'];
	
		//ambil nilai
			
			$n2=mysql_query("select * from nilai_matrik where id_kriteria='$idalt2'");
		$jarakp2=0;
		$c2=0;
		$ymax2=array();
		
		while($dn2=mysql_fetch_assoc($n2)){
			$idk2=$dn2['id_kriteria'];
						
			//nilai kuadrat
			
			$nilai_kuadrat2=0;
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk2' ");
			while($dkuadrat2=mysql_fetch_assoc($k2)){
				$nilai_kuadrat2=$nilai_kuadrat2+($dkuadrat2['nilai']*$dkuadrat2['nilai']);
			}

			//hitung jml peserta
			$jml_peserta2=mysql_query("select * from peserta");
			
			$jml_a2=mysql_num_rows($jml_peserta2);	
			//nilai bobot kriteria (rata")
			$bobot2=0;
			$tnilai2=0;
			
			$k22=mysql_query("select * from nilai_matrik where id_kriteria='$idk2' ");
			while($dbobot2=mysql_fetch_assoc($k22)){
				$tnilai2=$tnilai2+$dbobot2['nilai'];
			}	
			 $bobot2=$tnilai2/$jml_a2;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk2'");
			$nbot2=mysql_fetch_assoc($b2);
			$bot2=$nbot2['bobot'];
			
			
			$v2=round(($dn2['nilai']/sqrt($nilai_kuadrat2))*$bot2,3);

				$ymax2[$c2]=$v2;
				$c2++;
				$mak2=max($ymax2);
			
		}
					
		//hitung D+			
			foreach($ymax2 as $nymax2){
				
				$jarakp2=$jarakp2+pow($nymax2-$mak2,2);
				
			}
			
		//array max
		$maxarray[$i3]=max($ymax2);
				
		//print_r($maxarray);
		//print_r(max($ymax2));			
		$i2++;
		$i3++;
}
//session array ymax
$_SESSION['ymax']=$maxarray;

//array baris//////////////////////////////////////////////////
$i=1;
$ii=0;
$dpreferensi=array();

$a=mysql_query("select * from peserta");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){
		
		$idalt=$da['id_peserta'];
	
		//ambil nilai			
			$n=mysql_query("select * from nilai_matrik where id_peserta='$idalt'");
		$jarakp=0;
		$c=0;
		$ymax=array();
		$arraymaks=array();
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
				$mak=max($ymax);
		
		}
			//hitung D+ 
			foreach($ymax as $nymax=>$value){
				$maks=$_SESSION['ymax'][$nymax];
				//echo $maks." - ";
				$final=sqrt($jarakp=$jarakp+pow($value-$maks,2));
				//echo $jarakp." || ";
			}
	
		echo "<tr>
		<td>$i</td>
		<td>$da[nm_peserta]</td>
		<td>".round($final,3)."</td>
		</tr>";		
		$dpreferensi[$ii]=round($final,3);
		$_SESSION['dplus']=$dpreferensi;		
		//print_r($ymax);
	
		$i++;
		$ii++;
		
}

echo "</tr>";

?>

</tbody>
</table>

<!-- tabel min ------------------------------------------------->

<div class="box-header">
    <h3 class="box-title " >Jarak Solusi Ideal Negatif (D<sup>-</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th >Nomor</th>
<th >Nama</th>
<th >D<sup>-</sup></th>
</tr>
</thead>
<tbody>
<?php
//buat array kolom

$i2=1;
$i3=0;
$minarray=array();
$a2=mysql_query("select * from kriteria");
echo "<tr>";
while($da2=mysql_fetch_assoc($a2)){
		
		$idalt2=$da2['id_kriteria'];
	
		//ambil nilai
			
			$n2=mysql_query("select * from nilai_matrik where id_kriteria='$idalt2'");
		$jarakp2=0;
		$c2=0;
		$ymin2=array();
		
		while($dn2=mysql_fetch_assoc($n2)){
			$idk2=$dn2['id_kriteria'];
						
			//nilai kuadrat
			
			$nilai_kuadrat2=0;
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk2' ");
			while($dkuadrat2=mysql_fetch_assoc($k2)){
				$nilai_kuadrat2=$nilai_kuadrat2+($dkuadrat2['nilai']*$dkuadrat2['nilai']);
			}

			//hitung jml peserta
			$jml_peserta2=mysql_query("select * from peserta");
			
			$jml_a2=mysql_num_rows($jml_peserta2);	
			//nilai bobot kriteria (rata")
			$bobot2=0;
			$tnilai2=0;
			
			$k22=mysql_query("select * from nilai_matrik where id_kriteria='$idk2' ");
			while($dbobot2=mysql_fetch_assoc($k22)){
				$tnilai2=$tnilai2+$dbobot2['nilai'];
			}	
			 $bobot2=$tnilai2/$jml_a2;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk2'");
			$nbot2=mysql_fetch_assoc($b2);
			$bot2=$nbot2['bobot'];
						
			$v2=round(($dn2['nilai']/sqrt($nilai_kuadrat2))*$bot2,3);

				$ymin2[$c2]=$v2;
				$c2++;
				$min2=min($ymin2);
							
		}
			
		//hitung D+
			
			foreach($ymin2 as $nymin2){
				
				$jarakp2=$jarakp2+pow($nymin2-$min2,2);
				//echo "--".$mak."---";
			}
	
		//array max
		$minarray[$i3]=min($ymin2);
	
		//print_r($maxarray);
		//print_r(max($ymax2));

		$i2++;
		$i3++;
}
//session array ymax
$_SESSION['ymin']=$minarray;

//array baris//////////////////////////////////////////////////
$i=1;
$ii=0;
$id_alt=array();
$a=mysql_query("select * from peserta");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){
	
		$idalt=$da['id_peserta'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_peserta='$idalt'");
		$jarakp=0;
		$c=0;
		$ymax=array();
		$arraymin=array();
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

				$ymin[$c]=$v;
				$c++;
				$min=max($ymin);

		}
			//hitung D+
			foreach($ymin as $nymin=>$value){
				$mins=$_SESSION['ymin'][$nymin];
			//	echo $mins." - ";
				$final=sqrt($jarakp=$jarakp+pow($value-$mins,2));
			//	echo $jarakp." || ";

			}
	
		echo "<tr>
		<td>$i</td>
		<td>$da[nm_peserta]</td>
		<td>".round($final,3)."</td>
		</tr>";		
		//session min
		$dpreferensi[$ii]=round($final,3);
		$_SESSION['dmin']=$dpreferensi;	
		//print_r($ymin);

		//ambil id peserta
		$id_alt[$ii]=$da['id_peserta'];
		$_SESSION['id_alt']=$id_alt;	
		
		$i++;
		$ii++;
}

echo "</tr>";

?>

</tbody>
</table>
