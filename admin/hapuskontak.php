<?php
$take = $connect->query("SELECT * FROM staf_kelurahan WHERE id_staf='$_GET[id]'");
$row = $take->fetch_assoc();
$foto = $row['foto_staf'];
if (is_file("../foto_admin/$foto")){
    unlink("../foto_admin/$foto");
}

$connect->query("DELETE FROM staf_kelurahan WHERE id_staf='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='index.php?halaman=stafkelurahan';</script>";
?>