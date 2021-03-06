    <?php
    include '../../controllers/topsis.php';
    $db = new topsis();
    ?>

    <head>
        <title>PT. PEGADAIAN</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
    </head>

    <div class="box-header">
        <h3 class="box-title">Data peserta</h3>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Id peserta</th>
            <th>Nama peserta</th>
            <th>Judul Kegiatan</th>
            <th>Tanggal</th>
            <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($db->tampil_data_peserta() as $d){
            ?>
            <tr>
            <td><?php echo $d['id_peserta']; ?></td>
            <td><?php echo $d['nm_peserta']; ?></td>
            <td><?php echo $d['judul']; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td>
            <a href="?a=peserta&k=ubaha&id=<?php echo $d['id_peserta']; ?>" class="btn btn-warning">Ubah</a>
            <a href="peserta/hapuspeserta.php?id=<?php echo $d['id_peserta']; ?>" class="btn btn-danger">Hapus</a>
            </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>