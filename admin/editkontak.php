<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$take = $connect->query("SELECT * FROM staf_kelurahan WHERE id_staf='$_GET[id]'");
$row = $take->fetch_assoc();
$fotolama = $row['foto_staf'];
?>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Edit Info Kontak Kelurahan</strong></h3>
   </div>
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group row mb-2">
                  <label for="" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label for="" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label for="" class="col-sm-2 col-form-label">Telp/Hp</label>
                  <div class="col-sm-10">
                     <input type="number" class="form-control" name="telp" value="<?php echo $row['tlpn_staf']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan']; ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
               <div class="form-group row mb-4">
                  <label for="" class="col-sm-3 col-form-label">Foto</label>
                  <div class="col-sm-18">
                     <img src="../foto_admin/<?php echo $row['foto_staf']; ?>" width="100" class="img-thumbnail" onerror="this.onerror=null; this.src='assets/img/default.png'" alt="">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Ubah Foto</label>
                  <div class="col-sm-8">
                     <input type="file" class="form-control" name="foto" style="height: 39px">
                  </div>
               </div>
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
   $take = $connect->query("SELECT * FROM staf_kelurahan WHERE id_staf='$_GET[id]'");
   $row = $take->fetch_assoc();
   $foto = $row['foto_staf'];

   $nama = $_FILES['foto']['name']; //ambil nama file yg di upload di form
   $lokasi = $_FILES['foto']['tmp_name']; //ambil file sementara (tmp) yang di upload di form
   //jika foto diganti maka..
   if (!empty($lokasi)) {
      move_uploaded_file($lokasi, "../foto_admin/$nama");
      $connect->query("UPDATE staf_kelurahan SET nama='$_POST[nama]',alamat='$_POST[alamat]',foto_staf='$nama',tlpn_staf='$_POST[telp]',jabatan='$_POST[jabatan]' WHERE id_staf='$_GET[id]'");
      if (is_file("../foto_admin/$foto")) {
         unlink("../foto_admin/$fotolama");
      }
   } else {
      $connect->query("UPDATE staf_kelurahan SET nama='$_POST[nama]',alamat='$_POST[alamat]',tlpn_staf='$_POST[telp]',jabatan='$_POST[jabatan]' WHERE id_staf='$_GET[id]'");
   }
   echo "<script>alert('Data berhasil diubah');</script>";
   echo "<script>location='index.php?halaman=stafkelurahan';</script>";
}
?>