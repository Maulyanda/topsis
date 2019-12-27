<?php 
 
class topsis{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "topsis";
 
	function __construct(){
		mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);
    }
	
    function kriteria(){
		$data = mysql_query("select * from kriteria");
		$d = mysql_num_rows($data);
		return $d;
    }

    function peserta(){
		$data = mysql_query("select * from peserta");
		return $data;
	}

	//FUNGSI USER
	function tampil_data_user(){
		$data = mysql_query("select * from user");
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tambah_user(){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pass = md5($_POST['password']);
        $pass_md5 = md5($pass);

		mysql_query("insert into user (nama,username,password) values('$nama','$username','$pass_md5')");
	}

	function edit_user($id){
		$data = mysql_query("select * from user where id='$id'");
		while($d = mysql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	 
	function update_user(){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
		
		mysql_query("update user set nama='$nama', username='$username', password='$password' where id='$id'");
	}

	function hapus_user($id){
		mysql_query("delete from user where id='$id'");
	}

	//FUNGSI KRITERIA
	function tampil_data_kriteria(){
		$data = mysql_query("select * from kriteria order by id_kriteria ASC");
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tambah_kriteria(){
        $id_kriteria = $_POST['id_kriteria'];
		$kriteria = $_POST['kriteria'];
		$bobot = $_POST['bobot'];
		$poin1 = $_POST['poin1'];
		$poin2 = $_POST['poin2'];
		$poin3 = $_POST['poin3'];
		$poin4 = $_POST['poin4'];
		$poin5 = $_POST['poin5'];
		$sifat = $_POST['sifat'];

		mysql_query("insert into kriteria (id_kriteria,kriteria,bobot,poin1,poin2,poin3,poin4,poin5,sifat) values ('$id_kriteria','$kriteria','$bobot','$poin1','$poin2','$poin3','$poin4','$poin5','$sifat')");
	}

	function edit_kriteria($id){
		$data = mysql_query("select * from kriteria where id_kriteria='$id'");
		while($d = mysql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
	 
	function update_kriteria(){
		$id_kriteria = $_POST['id_kriteria'];
		$kriteria = $_POST['kriteria'];
		$bobot = $_POST['bobot'];
		$poin1 = $_POST['poin1'];
		$poin2 = $_POST['poin2'];
		$poin3 = $_POST['poin3'];
		$poin4 = $_POST['poin4'];
		$poin5 = $_POST['poin5'];
		$sifat = $_POST['sifat'];

		mysql_query("update kriteria set kriteria='$kriteria', bobot='$bobot', poin1='$poin1',poin2='$poin2', poin3='$poin3', poin4='$poin4', poin5='$poin5', sifat='$sifat' where id_kriteria='$id_kriteria'");
	
	}

	function hapus_kriteria($id){
		mysql_query("delete from kriteria where id_kriteria='$id'");
	}

	#FUNGSI PESERTA
	function tampil_data_peserta(){
		$data = mysql_query("select * from peserta order by id_peserta ASC");
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tambah_peserta(){
        $id_peserta = $_POST['id_peserta'];
		$nm_peserta = $_POST['nm_peserta'];
		$judul = $_POST['judul'];
		$tanggal = $_POST['tanggal'];

		mysql_query("insert into peserta (id_peserta,nm_peserta,judul,tanggal) values ('$id_peserta','$nm_peserta','$judul','$tanggal')");
	}

	function edit_peserta($id){
		$data = mysql_query("select * from peserta where id_peserta='$id'");
		while($d = mysql_fetch_assoc($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function update_peserta(){
		$id_peserta = $_POST['id_peserta'];
		$nm_peserta = $_POST['nm_peserta'];
		$judul = $_POST['judul'];
		$tanggal = $_POST['tanggal'];

		mysql_query("update peserta set nm_peserta='$nm_peserta', judul='$judul', tanggal='$tanggal' where id_peserta='$id_peserta'");
	}

	function hapus_peserta($id){
		mysql_query("delete from peserta where id_peserta='$id'");
	}
}
 
?>