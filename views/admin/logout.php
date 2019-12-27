<?php 
session_start();
session_destroy();
header("location:../../index.php?a=hasiltopsis&k=nilai_matriks");
?>