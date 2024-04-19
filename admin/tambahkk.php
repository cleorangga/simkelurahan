<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>
<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>Tambah KK</strong></h3>
   </div>

   <!-- /.card-header -->
   <!-- form start -->
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="card-body">



         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nomor KK</label>
            <div class="col-sm-10">
               <input type="text" class="form-control form-control-sm" name="nmrkk" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="16">
            </div>
         </div>
         <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama & No. KTP</label>
            <div class="col-sm-10 input-group" id="aa">

               <select reqired class="form-control select2bs4" name="  ??????????????   ">
                  <?php $take = $connect->query("SELECT * FROM data_penduduk") ?>
                  <option selected disabled value="">- - Pilih Nama yang Bersangkutan - -</option>
                  <?php while ($row = $take->fetch_assoc()) { ?>
                     <option value="<?php echo $row['id_penduduk'] ?>">[ NIK : <?php echo $row['nik'] ?> ] <?php echo $row['nama'] ?> </option>
                  <?php } ?>
               </select>

               <div class="input-group-append" data-target="#aa" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-search"></i></div>
               </div>
            </div>
         </div> -->
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
   $terdaftar = $_POST["nmrkk"];
   $take = $connect->query("SELECT * FROM kartu_keluarga WHERE nomor_kk='$terdaftar'");
   $matched = $take->num_rows;
   if ($matched == 1) {
      echo "<script>window.alert('No.KK sudah terdaftar !');</script>";
   } else {
      $connect->query("INSERT INTO kartu_keluarga (nomor_kk) VALUES('$_POST[nmrkk]')");
      echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
      echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kartukeluarga'>";
   }
}
?>
</div>