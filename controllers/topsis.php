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

	function tampil_peserta(){
		$data = mysql_query("select * from peserta order by id_peserta ASC");
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tampil_data(){
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
} 
 
?>