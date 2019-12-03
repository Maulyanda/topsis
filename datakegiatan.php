<div class="box-header">
    <h3 class="box-title">Data kegiatan</h3>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Kode kegiatan</th>
<th>Judul kegiatan</th>
<th>Kategori kegiatan</th>
<th>Bobot</th>
<th>Poin 1</th>
<th>Poin 2</th>
<th>Poin 3</th>
<th>Poin 4</th>
<th>Poin 5</th>
<th>Sifat kegiatan</th>
<th>Pilihan</th>
</tr>
</thead>
<tbody>
<?php
include ("konfig/koneksi.php");

$s=mysql_query("select * from kegiatan order by id_kegiatan ASC");
while($d=mysql_fetch_assoc($s)){
?>
<tr>
<td><?php echo $d['id_kegiatan']; ?></td>
<td><?php echo $d['judul_kegiatan']; ?></td>
<td><?php echo $d['kategori_kegiatan']; ?></td>
<td><?php echo $d['bobot']; ?></td>
<td><?php echo $d['poin1']; ?></td>
<td><?php echo $d['poin2']; ?></td>
<td><?php echo $d['poin3']; ?></td>
<td><?php echo $d['poin4']; ?></td>
<td><?php echo $d['poin5']; ?></td>
<td><?php echo $d['sifat']; ?></td>
<td>
<a href="?a=kegiatan&k=ubahk&id=<?php echo $d['id_kegiatan']; ?>" class="btn btn-warning">Ubah</a>
<a href="hapus.php?id=<?php echo $d['id_kegiatan']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>