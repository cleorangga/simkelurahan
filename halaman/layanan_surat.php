<?php
if (!isset($_SESSION['user'])) {
   echo "<script>location='login.php';</script>";
   exit();
}
?>

<!-- <?php print_r($_SESSION["user"]); ?> -->

<!-- <div class="card rounded-0 border bg-transparent elevation-0">

</div> -->

<div class="card">
   <div class="card-header">
      <h3 class="card-title text-secondary"><i class="fas fa-file-upload mr-2 text-primary"></i><strong>Layanan Surat</strong></h3>
   </div>
   <div class="card-body">
      <div class="row">
         <!-- <div class="col-md-6">
         <div class="card9 card1 card-1 elevation-1 my-2">
            <h3>Surat Keterangan Usaha</h3>
            <a href="index.php?halaman=formsurat1" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-2 elevation-1 my-2">
            <h3>Surat Keterangan Penghasilan</h3>
            <a href="index.php?halaman=formsurat2" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-3 elevation-1 my-2">
            <h3>Surat Pengantar SKCK</h3>
            <a href="index.php?halaman=formsurat3" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-4 elevation-1 my-2">
            <h3>Surat Izin Keramaian</h3>
            <a href="index.php?halaman=formsurat4" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-5 elevation-1 my-2">
            <h3>Surat Keterangan Tidak Mampu</h3>
            <a href="index.php?halaman=formsurat5" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-1 elevation-1 my-2">
            <h3>Surat Keterangan Domisili</h3>
            <a href="index.php?halaman=formsurat6" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-6 elevation-1 my-2">
            <h3>Surat Keterangan Belum Menikah</h3>
            <a href="index.php?halaman=formsurat7" class="stretched-link"></a>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card9 card1 card-3 elevation-1 my-2">
            <h3>Surat Pengantar KTP</h3>
            <a href="index.php?halaman=formsurat8" class="stretched-link"></a>
         </div>
      </div> -->
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Keterangan Usaha</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat1" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Keterangan Penghasilan</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat2" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Pengantar SKCK</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat3" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Izin Keramaian</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat4" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Keterangan Tidak Mampu</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat5" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Keterangan Domisili</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat6" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Keterangan Belum Menikah</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat7" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6">
            <div class="info-box bg-white card1">
               <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Surat</span>
                  <span class="info-box-number">Pengantar KTP</span>
                  <span class="progress-description text-right">
                     <a href="index.php?halaman=formsurat8" class="small-box-footer text-sm text-success pr-2">
                        Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         <!-- <div class="col-12 col-sm-6">
         <div class="info-box bg-white card1">
            <span class="info-box-icon"><i class="fas fa-file-alt fa-2x text-info"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Surat</span>
               <span class="info-box-number">Keterangan Umum</span>
               <span class="progress-description text-right">
                  <a href="" class="small-box-footer text-sm text-success pr-2">
                     Buat Surat <i class="fas fa-caret-right fa-sm ml-1"></i>
                  </a>
               </span>
            </div>
         </div>
      </div> -->
      </div>
   </div>
</div>