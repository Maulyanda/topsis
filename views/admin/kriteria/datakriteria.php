<?php 
include '../../controllers/topsis.php';
$db = new topsis();
?>

<head>
	<title>PT. PEGADAIAN</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
</head>

<div class="box-header">
    <h3 class="box-title">Data kriteria</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Kode kriteria</th>
            <th>Kriteria</th>
            <th>Bobot</th>
            <th>Poin 1</th>
            <th>Poin 2</th>
            <th>Poin 3</th>
            <th>Poin 4</th>
            <th>Poin 5</th>
            <th>Sifat kriteria</th>
            <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($db->tampil_data_kriteria() as $d){
            ?>
            <tr>
                <td><?php echo $d['id_kriteria']; ?></td>
                <td><?php echo $d['kriteria']; ?></td>
                <td><?php echo $d['bobot']; ?></td>
                <td><?php echo $d['poin1']; ?></td>
                <td><?php echo $d['poin2']; ?></td>
                <td><?php echo $d['poin3']; ?></td>
                <td><?php echo $d['poin4']; ?></td>
                <td><?php echo $d['poin5']; ?></td>
                <td><?php echo $d['sifat']; ?></td>
                <td>
                <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-warning">Ubah</a>
                <a href="kriteria/hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>