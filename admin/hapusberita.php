<?php
$take = $connect->query("SELECT * FROM publikasi WHERE id_berita='$_GET[id]'");
$row = $take->fetch_assoc();
$gambar = $row['gambar'];
if (is_file("../gambar_berita/$gambar")){
    unlink("../gambar_berita/$gambar");
}

$connect->query("DELETE FROM publikasi WHERE id_berita='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='index.php?halaman=publikasi';</script>";
?>