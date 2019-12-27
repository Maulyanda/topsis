    <?php
        include '../../controllers/topsis.php';
        $db = new topsis();
    ?>

    <head>
		<title>PT. PEGADAIAN</title>
		<link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
	</head>

	<div class="box-header">
		<h3 class="box-title">Tambah user</h3>
	</div>

    <div class="box-body pad">
		<form action="" method="POST">
		<label>Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
		<br />
		<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
		<br />
		<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
		<br />
			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<br />
		</form>
	</div>

	<?php
	    if(isset($_POST['simpan'])){
            $db->tambah_user($_POST['nama'],$_POST['username'],$_POST['password']);

		if($db){
			echo "<script>alert('Disimpan'); window.open('index.php?a=user&k=user','_self');</script>";
		}
	}
	?>
	
