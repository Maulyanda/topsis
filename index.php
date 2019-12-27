<!DOCTYPE html>
<html lang="en">
<head>
  <title>PT PEGADAIAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PT PEGADAIAN</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
 <?php
if(@$_GET['a']=='hasiltopsis'){
	$active1='class="active"';
	$active2='';
	$active3='';
	$active4='';
}else{
	$active1='';
	$active2='';
	$active3='';
	$active4='';
}	
?> 
  
<!-- TAB KIRI -->
<div class="col-sm-2">
<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="?a=home">Home</a></li>
  <li <?php echo $active2 ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
</ul>  
</div>
<!-- /TAB KIRI -->  
  
<div class="col-sm-10">
 <?php
  if(@$_GET['a']=='home'){
    include ("views/home.php");
  }else if(@$_GET['a']=='hasiltopsis'){
	  include ("views/hasiltopsis.php");
  }
 ?>
</div>

</body>
</html>
