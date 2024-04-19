<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$take = $connect->query("SELECT * FROM publikasi WHERE id_berita='$_GET[id]'");
$row = $take->fetch_assoc();
$fotolama = $row['gambar'];
$waktu = date("Y-m-d H:i:s");
?>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Edit Berita</strong></h3>
   </div>
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>">
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
               <textarea class="summernote" name="isi" placeholder=""><?php echo $row['isi']; ?></textarea>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
               <input type="file" class="form-control" name="gambar" style="height: 39px">
            </div>
         </div>
      </div>
      <div class="card-footer">
         <button type="submit" class="btn btn-default btn-sm border border-secondary float-right" name="save"><i class="fa fa-check-square text-info fa-lg mr-2"></i><strong>Save</strong></button>
      </div>
   </form>
</div>

<?php
if (isset($_POST['save'])) {
   $take = $connect->query("SELECT * FROM publikasi WHERE id_berita='$_GET[id]'");
   $row = $take->fetch_assoc();
   $foto = $row['gambar'];
   
   $nama = $_FILES['gambar']['name']; //ambil nama file yg di upload di form
   $lokasi = $_FILES['gambar']['tmp_name']; //ambil file sementara (tmp) yang di upload di form
   //jika foto diganti maka..
   if (!empty($lokasi)) {
      move_uploaded_file($lokasi, "../gambar_berita/$nama");
      $connect->query("UPDATE publikasi SET judul='$_POST[judul]',isi='$_POST[isi]',gambar='$nama' WHERE id_berita='$_GET[id]'");
      if (is_file("../gambar_berita/$foto")) {
         unlink("../gambar_berita/$fotolama");
      }
   } else {
      $connect->query("UPDATE publikasi SET judul='$_POST[judul]',isi='$_POST[isi]' WHERE id_berita='$_GET[id]'");
   }
   echo "<script>alert('Data berhasil diubah');</script>";
   echo "<script>location='index.php?halaman=publikasi';</script>";
}
?>