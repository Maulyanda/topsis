    <?php
    include '../../controllers/topsis.php';
    $db = new topsis();
    ?>

    <head>
        <title>PT. PEGADAIAN</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.ico"/>
    </head>

    <div class="box-header">
        <h3 class="box-title">Ubah user</h3>
    </div>

    <div class="box-body pad">
        <form action="" method="POST">

            <?php
            foreach($db->edit_user($_GET['id']) as $d){
            ?>
            <label>ID</label>
                <input type="text" name="id" class="form-control" value="<?php echo $d['id']; ?>" readonly>
            <br />
            <label>Nama</label>
                <input type="text" name="nama" class="form-control"  placeholder="Masukkan nama" value="<?php echo $d['nama']; ?>" required>
            <br />
            <label>Username</label>
                <input type="text" name="username" class="form-control"  placeholder="Masukkan username" value="<?php echo $d['username']; ?>" required>
            <br />
            <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password"  required>
            <br />
            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
            <br />
            <?php } ?>
        </form>
    </div>

    <?php
    if(isset($_POST['ubah'])){
        $db->update_user($_POST['id'],$_POST['nama'],$_POST['username'],$_POST['password']);
        //$d=mysql_query("update user set nama='$_POST[nama]', username='$_POST[username]', password='$_POST[password]' where id='$_POST[id]'");
            
        if($db){
            echo "<script>alert('Diubah'); window.open('index.php?a=user&k=user','_self');</script>";
        }
    }
    ?>