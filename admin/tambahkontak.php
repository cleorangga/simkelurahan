<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Tambah Data Kontak Kelurahan</strong></h3>
   </div>
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="nama" required>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="alamat" required>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
               <input type="file" class="form-control" name="foto" style="height: 39px">
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Telp/Hp</label>
            <div class="col-sm-10">
               <input type="number" class="form-control" name="telp">
            </div>
         </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="jabatan" required>
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
   $nama = $_FILES['foto']['name'];
   $lokasi = $_FILES['foto']['tmp_name'];
   move_uploaded_file($lokasi, "../foto_admin/" . $nama);
   $connect->query("INSERT INTO staf_kelurahan (nama,alamat,foto_staf,tlpn_staf,jabatan) VALUES('$_POST[nama]','$_POST[alamat]','$nama','$_POST[telp]','$_POST[jabatan]')");

   echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
   echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=stafkelurahan'>";
}
?>