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
    
    function kegiatan(){
		$data = mysql_query("select * from kegiatan");
		$d = mysql_num_rows($data);
		return $d;
    }

    function peserta(){
		$data = mysql_query("select * from peserta");
		return $data;
    }
    

 
} 
 
?>