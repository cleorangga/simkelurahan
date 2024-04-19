<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Tambah Surat</strong></h3>
   </div>
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama & No. KTP</label>
            <div class="col-sm-10 input-group" id="aa">
               <select reqired class="form-control selectsurat" name="idpengguna" required>
                  <?php $take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk") ?>
                  <option selected disabled value=""></option>
                  <?php while ($row = $take->fetch_assoc()) { ?>
                     <option value="<?php echo $row['id_pengguna'] ?>">[ NIK : <?php echo $row['nik'] ?> ] <?php echo $row['nama'] ?> </option>
                  <?php } ?>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Surat</label>
            <div class="col-sm-10">
               <select class="form-control div-toggle select2ns" data-target=".jenissurat" name="jenissurat" required>
                  <option selected disabled value="">-- Jenis Surat --</option>
                  <option value="Surat Keterangan Usaha" data-show=".surat1">Surat Keterangan Usaha</option>
                  <option value="Surat Keterangan Penghasilan" data-show=".surat2">Surat Keterangan Penghasilan</option>
                  <option value="Surat Pengantar SKCK" data-show=".surat3">Surat Pengantar SKCK</option>
                  <option value="Surat Izin Keramaian" data-show=".surat4">Surat Izin Keramaian</option>
                  <option value="Surat Keterangan Tidak Mampu" data-show=".surat5">Surat Keterangan Tidak Mampu</option>
                  <option value="Surat Keterangan Domisili" data-show=".surat6">Surat Keterangan Domisili</option><!-- .surat.6 dan surat.7 PAKAI INPUT SAMA (keperluan) -->
                  <option value="Surat Keterangan Belum Menikah" data-show=".surat6">Surat Keterangan Belum Menikah</option><!-- .surat.6 dan surat.7 PAKAI INPUT SAMA (keperluan) -->
                  <option value="Surat Pengantar KTP" data-show=".surat7">Surat Pengantar KTP</option>
               </select>
            </div>
         </div>
         <div class="jenissurat">
            <div class="form-group row surat1 hide">
               <!-- filter berdasarkan select option -->
               <label class="col-sm-2 col-form-label">Nama Usaha</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="namausaha">
                  <!-- <input type="text" class="form-control" name="namausaha" pattern="[a-zA-Z0-9]*"> -->
               </div>
            </div>
            <div class="form-group row surat1 hide">
               <label class="col-sm-2 col-form-label">Alamat Usaha</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamatusaha">
               </div>
            </div>
            <div class="form-group row surat2 hide">
               <label class="col-sm-2 col-form-label">Jumlah Penghasilan</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlahpenghasilan" placeholder="Penghasilan rata-rata (per bulan)">
               </div>
            </div>
            <div class="form-group row surat4 hide">
               <label class="col-sm-2 col-form-label">Acara/Kegiatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="kegiatan">
               </div>
            </div>
            <div class="form-group row surat4 hide">
               <label class="col-sm-2 col-form-label">Waktu Kegiatan</label>
               <div class="col-sm-10">
                  <input type="date" class="form-control" name="waktukegiatan">
               </div>
            </div>
            <div class="form-group row surat4 hide">
               <label class="col-sm-2 col-form-label">Tempat Kegiatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempatkegiatan">
               </div>
            </div>
            <div class="form-group row surat5 hide">
               <label class="col-sm-2 col-form-label">Pendapatan Rata-rata</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" name="pendapatankeluarga" placeholder="Pendapatan rata-rata Keluarga (per Bulan)">
               </div>
            </div>
            <div class="form-group row surat6 hide">
               <label class="col-sm-2 col-form-label">Keperluan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="keperluan">
               </div>
            </div>
            <div class="form-group row surat7 hide">
               <label class="col-sm-2 col-form-label">Nomor KK</label>
               <div class="col-sm-10">
                  <input type="number" class="form-control" name="nomorkk">
               </div>
            </div>
         </div>
         <div class="form-group row mb-2">
            <label class="col-sm-2 col-form-label">Catatan</label>
            <div class="col-sm-10">
               <textarea class="form-control" rows="3" name="ket" placeholder="(opsional)"></textarea>
            </div>
         </div>
      </div>
      <div class="card-footer bg-white border py-2">
         <button type="submit" class="btn btn-app bg-default rounded-lg mb-0 float-right" name="save"><i class="fa fa-check-square text-info"></i>
            <strong>Save</strong></button>
      </div>
   </form>
</div>

<?php
if (isset($_POST['save'])) {
   $jenissurat = $_POST["jenissurat"];
   // $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,nama_usaha,alamat_usaha,keterangan) VALUES('{$_SESSION['idpengguna']}','$_POST[jenissurat]','$_POST[namausaha]','$_POST[alamatusaha]','$_POST[ket]')");
   // echo "<div class='alert alert-success mt-3 mx-4'>Berhasil Ditambahkan</div>";
   // echo "<meta http-equiv='refresh' content='1;url=index.php'>";

   if ($jenissurat == 'Surat Keterangan Usaha') {
      $namausaha = ucwords($_POST["namausaha"]); // <--- semua input (huruf pertama) jadi kapital 
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,nama_usaha,alamat_usaha,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$namausaha','$_POST[alamatusaha]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Keterangan Penghasilan') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,Jumlah_penghasilan,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[jumlahpenghasilan]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Pengantar SKCK') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Izin Keramaian') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,kegiatan,waktu_kegiatan,tempat_kegiatan,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[kegiatan]','$_POST[waktukegiatan]','$_POST[tempatkegiatan]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,pendapatan_keluarga,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[pendapatankeluarga]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Keterangan Domisili') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,keperluan,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[keperluan]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Keterangan Belum Menikah') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,keperluan,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[keperluan]','$_POST[ket]')");
   } elseif ($jenissurat == 'Surat Pengantar KTP') {
      $connect->query("INSERT INTO tb_surat (id_pengguna,jenis_surat,nomor_kk,keterangan) VALUES('{$_POST['idpengguna']}','$_POST[jenissurat]','$_POST[nomorkk]','$_POST[ket]')");
   }
   echo "<script>alert('Data berhasil Ditambah');</script>";
   echo "<script>location='index.php?halaman=layanansurat';</script>";
}
?>