<?php 
$connect->query("DELETE FROM tb_surat WHERE id_surat='$_GET[id]'");

echo "<script>location='index.php?halaman=layanansurat';</script>";
?>