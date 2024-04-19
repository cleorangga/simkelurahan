<?php 
$connect->query("DELETE FROM penduduk_has_kk WHERE id_penduduk='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
// echo "<script>location='index.php?halaman=kartukeluarga';</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=editkk&id=$_GET[idkk]'>";
?>