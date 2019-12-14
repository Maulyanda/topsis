<?php
//session_start();
include '../../controllers/topsis.php';
$db = new topsis();
$h = $db->kriteria();
?>


<table class="table table-bordered table-responsive">
<thead>
<tr>
<th >Nomor</th>
<th >Nama</th>
<th >V<sub>i</sub></th>
</tr>

</thead>
<tbody>
<?php
$i=1;
$a=mysql_query("select * from peserta");
echo "<tr>";
$sortir=array();
while($da=mysql_fetch_assoc($a)){

		$idalt=$da['id_peserta'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_peserta='$idalt'");
		
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
				$mak=max($ymax);
				$min=min($ymax);	
			
		}

		$i++;

}


foreach($_SESSION['dplus'] as $key=>$dxmin){
	$jarakm=$_SESSION['dmin'][$key];
	$id_alt=$_SESSION['id_alt'][$key];
	
	//nama peserta
	$nama=mysql_query("select * from peserta where id_peserta='$id_alt'");
	$nm=mysql_fetch_assoc($nama);
	
	$nilaid=$jarakm/($jarakm+$dxmin);
	
		$nilai=round($nilaid,4);
	
		
	
	//simpan ke tabel nilai preferensi
	$nm=$nm['nm_peserta'];
	$sql2=mysql_query("insert into nilai_preferensi (nm_peserta,nilai) values('$nm','$nilai')");
		
	
}
 
 //ambil data sesuai dengan nilai tertinggi
 $i=1;
	$sql3=mysql_query("select * from nilai_preferensi order by nilai Desc");
	while($data3=mysql_fetch_assoc($sql3)){
		echo "<tr>
		<td>".$i."</td>
		<td>$data3[nm_peserta]</td>
		<td>$data3[nilai]</td>
		</tr>";
		
		$i++;
	}
 
 
 //kosongkan tabel nilai preferensi
 $del=mysql_query("delete from nilai_preferensi");

echo "</tr>";
?>

</tbody>
</table>
</div>