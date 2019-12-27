	<?php 
	include '../../controllers/topsis.php';
	$db = new topsis();
	?>

    <head>
        <title>PT. PEGADAIAN</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
    </head>
 
    <div class="box-header">
        <h3 class="box-title">Data user</h3>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<!-- <th>Password</th> -->
		<th>Opsi</th>
	</tr>
    </thead>
    <tbody>

	<?php
	$no = 1;
	foreach($db->tampil_data_user() as $x){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['username']; ?></td>
		<!-- <td><?php echo $x['password']; ?></td> -->
		<td>
			<a href="?a=user&k=ubah&id=<?php echo $x['id']; ?>" class="btn btn-warning">Ubah</a>
			<a href="user/hapus_user.php?id=<?php echo $x['id']; ?>" class="btn btn-danger">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
    </tbody>
</table>