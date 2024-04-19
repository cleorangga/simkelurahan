<?php 
$connect->query("DELETE FROM pengguna WHERE id_pengguna='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='index.php?halaman=user';</script>";
?>