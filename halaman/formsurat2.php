<?php
if (!isset($_SESSION['user'])) {
   echo "<script>location='login.php';</script>";
   exit();
}
?>
<div class="card">
   <div class="card-header">
      <h3 class="card-title"><strong>Masukkan info Keterangan Penghasilan</strong></h3>
   </div>

   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="form-group row mb-2">
            <label class="col-sm-2 col-form-label">Jenis Surat</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" name="jenissurat" placeholder="Surat Keterangan Penghasilan" value="Surat Keterangan Penghasilan" readonly>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label class="col-sm-2 col-form-label">Atas Nama</label>
            <div class="col-sm-10">
               <input type="text" readonly class="form-control" name="nama" value="<?php echo ("{$_SESSION['namapengguna']}"); ?>">
            </div>
         </div>
         <div class="form-group row mb-2">
            <label class="col-sm-4 col-form-label">Jumlah Penghasilan</label>
            <div class="col-sm-8">
               <input type="number" class="form-control" name="jumlahpenghasilan" placeholder="Penghasilan Rata-rata (per bulan)" required>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label class="col-sm-4 col-form-label">Catatan</label>
            <div class="col-sm-8">
               <textarea class="form-control" rows="3" name="ket" placeholder="(opsional)"></textarea>
            </div>
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer bg-white">
         <button type="submit" class="btn btn-dark float-right" name="save"><i class="fa fa-paper-plane mr-2"></i>Kirim</button>
      </div>
   </form>
   <?php
   if (isset($_POST['save'])) {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,Jumlah_penghasilan,keterangan) VALUES('{$_SESSION['idpengguna']}','$_POST[jenissurat]','$_POST[jumlahpenghasilan]','$_POST[ket]')");
      echo "<div class='alert alert-success mt-3 mx-4'>Berhasil Ditambahkan</div>";
      echo "<meta http-equiv='refresh' content='1;url=index.php'>";
   }
   ?>
</div>