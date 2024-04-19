<?php 
$connect->query("DELETE FROM kartu_keluarga WHERE id_keluarga='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='index.php?halaman=kartukeluarga';</script>";
?>