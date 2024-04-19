<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$waktu = date("Y-m-d H:i:s");
?>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Tambah Berita</strong></h3>
   </div>
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="judul" required>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
               <textarea class="summernote" name="isi" placeholder="" required></textarea>
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
   $gambar = $_FILES['gambar']['name'];
   $lokasi = $_FILES['gambar']['tmp_name'];
   move_uploaded_file($lokasi, "../gambar_berita/" . $gambar);
   $connect->query("INSERT INTO publikasi (judul,isi,waktu,gambar) VALUES('$_POST[judul]','$_POST[isi]','$waktu','$gambar')");

   echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
   echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=publikasi'>";
}
?>