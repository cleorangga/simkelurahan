<?php
$take = $connect->query("SELECT count(*) as totalpenduduk from data_penduduk");
$datapenduduk = $take->fetch_assoc();
?>
<?php
$take = $connect->query("SELECT count(*) as totaluser from pengguna");
$datapengguna = $take->fetch_assoc();
?>
<?php
$take = $connect->query("SELECT * FROM data_penduduk where jenis_kelamin='Laki-laki'");
$laki_laki = $take->num_rows;
$take = $connect->query("SELECT * FROM data_penduduk where jenis_kelamin='Perempuan'");
$perempuan = $take->num_rows;
// $take = $connect->query("SELECT * FROM data_penduduk where alamat='Lingkungan 1, Kelurahan Rinegetan'");
// $ling1 = $take->num_rows;
// $take = $connect->query("SELECT * FROM data_penduduk where alamat='Lingkungan 2, Kelurahan Rinegetan'");
// $ling2 = $take->num_rows;
// $take = $connect->query("SELECT * FROM data_penduduk where alamat='Lingkungan 3, Kelurahan Rinegetan'");
// $ling3 = $take->num_rows;
// $take = $connect->query("SELECT * FROM data_penduduk where alamat='Lingkungan 4, Kelurahan Rinegetan'");
// $ling4 = $take->num_rows;
// $take = $connect->query("SELECT * FROM data_penduduk where alamat='Lingkungan 5, Kelurahan Rinegetan'");
// $ling5 = $take->num_rows;
?>
<?php
$take = $connect->query("SELECT count(*) as totalsurat from tb_surat where status_surat='1'");
$datasurat = $take->fetch_assoc();
?>
<?php
$take = $connect->query("SELECT count(*) as totalkk from kartu_keluarga");
$datakk = $take->fetch_assoc();
?>
<?php
//$take = $connect->query("SELECT * FROM tb_surat where jenis_surat='Surat Keterangan Usaha'");
//$skusaha = $take->num_rows;
//$take = $connect->query("SELECT * FROM tb_surat where jenis_surat='Surat Keterangan Penghasilan'");
//$skpenghasilan = $take->num_rows;
//$take = $connect->query("SELECT * FROM tb_surat where jenis_surat='Surat Pengantar SKCK'");
//$skck = $take->num_rows;
?>

<!-- <pre><?php print_r($_SESSION["admin"]); ?></pre> -->
<div class="row">
   <div class="col-md-12">
      <div class="row px-2">
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-light">
               <span class="info-box-icon m-2"><i class="fas fa-chart-pie fa-2x text-danger"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Penduduk</span>
                  <span class="info-box-number text-lg"><?php echo $datapenduduk['totalpenduduk']; ?></span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=penduduk" class="small-box-footer text-dark pr-2">
                        More info <i class="fas fa-external-link-alt fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-light">
               <span class="info-box-icon m-2"><i class="fas fa-home fa-2x text-danger"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Keluarga</span>
                  <span class="info-box-number text-lg"><?php echo $datakk['totalkk']; ?></span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=kartukeluarga" class="small-box-footer text-dark pr-2">
                        More info <i class="fas fa-external-link-alt fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-light">
               <span class="info-box-icon m-2"><i class="fas fa-file-alt fa-2x text-danger"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat Tercetak</span>
                  <span class="info-box-number text-lg"><?php echo $datasurat['totalsurat']; ?></span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=layanansurat" class="small-box-footer text-dark pr-2">
                        More info <i class="fas fa-external-link-alt fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-light">
               <div class="inner">
                  <h3><?php echo $laki_laki; ?></h3>
                  <p>Laki-laki</p>
               </div>
               <div class="icon">
                  <i class="fas fa-male"></i>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-light">
               <div class="inner">
                  <h3><?php echo $perempuan; ?></h3>
                  <p>Perempuan</p>
               </div>
               <div class="icon">
                  <i class="fas fa-female"></i>
               </div>
            </div>
         </div> -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-light">
               <span class="info-box-icon m-2"><i class="fas fa-users fa-2x text-danger"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">User</span>
                  <span class="info-box-number text-lg"><?php echo $datapengguna['totaluser']; ?></span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=user" class="small-box-footer text-dark pr-2">
                        More info <i class="fas fa-external-link-alt fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<div class="col-md-12">
   <!-- <?php
         $pekerjaan = mysqli_query($connect, "SELECT pekerjaan FROM data_penduduk GROUP BY pekerjaan");
         ?>
      <?php
      $total = mysqli_query($connect, "SELECT pekerjaan FROM data_penduduk GROUP BY pekerjaan");
      // $row = mysqli_fetch_assoc($total);
      $matched = $total->num_rows;
      ?> -->


   <?php include 'info_penduduk.php'; ?>
   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-md-8">
               <div class="tab-content" id="vert-tabs-right-tabContent">
                  <div class="tab-pane fade show active" id="vert-tabs-right-home" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                     <h3>Jumlah Penduduk Per Lingkungan</h3>
                     <canvas id="piechartpenduduk" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-right-one" role="tabpanel" aria-labelledby="vert-tabs-right-one-tab">
                     <h3>Jenis Kelamin</h3>
                     <canvas id="jeniskelamin" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-right-two" role="tabpanel" aria-labelledby="vert-tabs-right-two-tab">
                     <h3>Status</h3>
                     <canvas id="statusnikah" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-right-three" role="tabpanel" aria-labelledby="vert-tabs-right-three-tab">
                     <h3>Agama</h3>
                     <canvas id="agama" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-right-four" role="tabpanel" aria-labelledby="vert-tabs-right-four-tab">
                     <h3>Golongan Darah</h3>
                     <canvas id="golongandarah" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-right-home-tab" data-toggle="pill" href="#vert-tabs-right-home" role="tab" aria-controls="vert-tabs-right-home" aria-selected="true">
                     <h4><small class="text-muted">Penduduk</small></h4>
                  </a>
                  <a class="nav-link" id="vert-tabs-right-one-tab" data-toggle="pill" href="#vert-tabs-right-one" role="tab" aria-controls="vert-tabs-right-one" aria-selected="false">
                     <h4><small class="text-muted">Jenis Kelamin</small></h4>
                  </a>
                  <a class="nav-link" id="vert-tabs-right-two-tab" data-toggle="pill" href="#vert-tabs-right-two" role="tab" aria-controls="vert-tabs-right-two" aria-selected="false">
                     <h4><small class="text-muted">Status</small></h4>
                  </a>
                  <a class="nav-link" id="vert-tabs-right-three-tab" data-toggle="pill" href="#vert-tabs-right-three" role="tab" aria-controls="vert-tabs-right-three" aria-selected="false">
                     <h4><small class="text-muted">Agama</small></h4>
                  </a>
                  <a class="nav-link" id="vert-tabs-right-four-tab" data-toggle="pill" href="#vert-tabs-right-four" role="tab" aria-controls="vert-tabs-right-four" aria-selected="false">
                     <h4><small class="text-muted">Gol. Darah</small></h4>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- /.card -->
   </div>
</div>

<!-- <div class="col">
         <div class="card card-body">
            <?php echo $matched ?>
            <canvas id="asd" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
         </div>
      </div> -->
</div>