<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$take = $connect->query("SELECT * FROM kartu_keluarga WHERE id_keluarga='$_GET[id]'");
$row = $take->fetch_assoc();
$idkeluarga = $row['id_keluarga']
?>
<div id="dialog" title="Hapus" style="display: none;" class="text-center">
<p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus data KK ?</p>
</div>

<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <a href="index.php?halaman=kartukeluarga" class="btn btn-tool btn-default border border-secondary">
         <i class="fas fa-arrow-left fa-lg text-secondary mr-2"></i><strong>Kembali</strong>
      </a>

      <div class="card-tools">
         <a href="index.php?halaman=hapuskk&id=<?php echo $row['id_keluarga']; ?>" class="btn btn-tool btn-default border border-secondary confirmLink">
            <i class="far fa-trash-alt fa-lg text-danger mr-2"></i><strong>Hapus KK</strong>
         </a>
      </div>
   </div>
   <div class="card-body table-responsive table-sm p-2">
   <h3 class="text-center text-lg text-bold"><?php echo $row['nomor_kk'] ?></h3>
   <br>
   <h4 class="text-center text-md text-bold">Anggota:</h4>
      <table class="table table-bordered table-head-fixed">
         <thead>
            <tr>
               <th class="text-center">#</th>
               <th>nik</th>
               <th>nama</th>
               <th>status dalam keluarga</th>
               <th>opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM penduduk_has_kk JOIN data_penduduk ON penduduk_has_kk.id_penduduk=data_penduduk.id_penduduk WHERE id_keluarga='$_GET[id]' ORDER BY status_kk DESC") ?>
            <?php while ($extract = $take->fetch_assoc()) { ?>
               <tr>
                  <td class="text-center"><?php echo $nomor; ?></td>
                  <td><?php echo $extract['nik']; ?></td>
                  <td><?php echo $extract['nama']; ?></td>
                  <td><?php echo $extract['status_kk']; ?></td>
                  <td class="text-center">

                     <div class="btn-group btn-group-sm">
                        <!-- <a href="index.php?halaman=editkk&id=<?php echo $extract['id_keluarga']; ?>" class="btn btn-default mr-2"><i class="fas fa-cog text-success mr-1"></i>Edit</a> -->
                        <a href="index.php?halaman=editpenduduk&id=<?php echo $extract['id_penduduk']; ?>" target="_blank" class="btn btn-default"><i class="fas fa-link text-success mr-1"></i>Info</a>
                        <a href="index.php?halaman=hapusanggota&id=<?php echo $extract['id_penduduk']; ?>&idkk=<?php echo $extract['id_keluarga']; ?>" class="btn btn-default confirmLink"><i class="fas fa-trash-alt text-danger mr-1"></i>hapus</a>
                     </div>

                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>


<div class="card card-light mx-4 mt-4">
   <div class="card-header">
      <h3 class="card-title"><strong>Tambah Anggota KK</strong></h3>
   </div>

   <!-- /.card-header -->
   <!-- form start -->
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">

         <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">nomor KK</label>
            <div class="col-sm-10">
               <input type="text" class="form-control form-control-sm" name="nmrkk" value="<?php echo $row['nomor_kk'] ?>" disabled>
            </div>
         </div> -->
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama & No. KTP</label>
            <div class="col-sm-10 input-group" id="">

               <select required class="form-control select2" name="idpenduduk">
                  <?php $take = $connect->query("SELECT * FROM data_penduduk") ?>
                  <option selected disabled value=""></option>
                  <?php while ($row = $take->fetch_assoc()) { ?>
                     <option value="<?php echo $row['id_penduduk'] ?>">[ NIK : <?php echo $row['nik'] ?> ] <?php echo $row['nama'] ?> </option>
                  <?php } ?>
               </select>


            </div>
         </div>
         <div class="form-group row mb-2">
            <label class="col-2 col-form-label">Status</label>
            <div class="col-sm-10">
               <select class="form-control form-control-sm select2ns" name="status" required>
                  <option selected disabled value=""></option>
                  <option value="Anggota">Anggota</option>
                  <option value="Kepala Keluarga">Kepala Keluarga</option>
               </select>
            </div>
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
         <button type="submit" class="btn btn-default btn-sm border border-secondary float-right" name="save"><i class="fa fa-check-square text-info fa-lg mr-2"></i><strong>Save</strong></button>
      </div>
</div>
<!-- /.card-footer -->
</form>
<?php
if (isset($_POST['save'])) {
   $terdaftar = $_POST["idpenduduk"];
   $take = $connect->query("SELECT * FROM penduduk_has_kk WHERE id_penduduk='$terdaftar'");
   $matched = $take->num_rows;
   if ($matched == 1) {
      echo "<script>window.alert('NIK sudah terdaftar dalam KK !');</script>";
   } else {
      $connect->query("INSERT INTO penduduk_has_kk (id_keluarga,id_penduduk,status_kk) VALUES('$idkeluarga','$_POST[idpenduduk]','$_POST[status]')");
      echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
      echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=editkk&id=$_GET[id]'>";
   }
}
?>
</div>