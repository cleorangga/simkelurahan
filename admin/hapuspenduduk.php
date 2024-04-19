<?php 
$connect->query("DELETE FROM data_penduduk WHERE id_penduduk='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='index.php?halaman=penduduk';</script>";
?>