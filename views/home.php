<?php
session_start();
include 'controllers/topsis.php';
$db = new topsis();
$h = $db->kriteria();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myYear").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<label>Search</label>
<input id="myInput" type="text" placeholder="Search.." class="form-control">

<br>
 
<label>Filter berdasarkan Tahun</label>
<select id="myYear" class="form-control">
	<option value=''>- Pilih -</option>
	<option value="2020">2020</option>
	<option value="2019">2019</option>
	<option value="2018">2018</option>
	<option value="2017">2017</option>
 	<option value="2016">2016</option>
</select>
<br><br>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<!-- <th >Nomor</th> -->
<th >Nama</th>
<th >V<sub>i</sub></th>
<th>Judul Kegiatan</th>
<th>Tanggal Kegiatan</th>
</tr>

</thead>
<tbody id="myTable">
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
    
    //judul peserta
	$judul=mysql_query("select * from peserta where id_peserta='$id_alt'");
	$jdl=mysql_fetch_assoc($judul);
	
	//tanggal kegiatan peserta
	$tanggal=mysql_query("select * from peserta where id_peserta='$id_alt'");
    $tgl=mysql_fetch_assoc($tanggal);
    
	$nilaid=$jarakm/($jarakm+$dxmin);
	
		$nilai=round($nilaid,4);
	
	
	//simpan ke tabel nilai preferensi
    $nm=$nm['nm_peserta'];
	$jdl=$jdl['judul'];
	$tgl=$tgl['tanggal'];
	$sql2=mysql_query("insert into nilai_preferensi (nm_peserta,nilai,judul,tanggal) values('$nm','$nilai','$jdl','$tgl')");
		
	
}
 
 //ambil data sesuai dengan nilai tertinggi
 $i=1;
	$sql3=mysql_query("select * from nilai_preferensi order by nilai Desc");
	while($data3=mysql_fetch_assoc($sql3)){
		echo "<tr>
		<td>$data3[nm_peserta]</td>
        <td>$data3[nilai]</td>
		<td>$data3[judul]</td>
		<td>$data3[tanggal]</td>
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