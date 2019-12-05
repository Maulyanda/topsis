<div class="box-header">
    <h3 class="box-title">Data peserta</h3>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Id peserta</th>
<th>Nama peserta</th>
<th>Pilihan</th>
</tr>
</thead>
<tbody>
<?php
include ("konfig/koneksi.php");

$s=mysql_query("select * from peserta order by id_peserta ASC");
while($d=mysql_fetch_assoc($s)){
?>
<tr>
<td><?php echo $d['id_peserta']; ?></td>
<td><?php echo $d['nm_peserta']; ?></td>
<td>
<a href="?a=peserta&k=ubaha&id=<?php echo $d['id_peserta']; ?>" class="btn btn-warning">Ubah</a>
<a href="hapuspeserta.php?id=<?php echo $d['id_peserta']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>