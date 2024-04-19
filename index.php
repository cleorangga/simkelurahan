<?php
session_start();
include 'halaman/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Home Page</title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="admin/assets/css/adminlte.min.css">
   <link rel="stylesheet" href="admin/plugins/jquery-ui/jquery-ui.min.css">
   <link rel="stylesheet" href="admin/plugins/jquery-ui/jquery-ui.theme.min.css">
   <link rel="stylesheet" href="admin/plugins/jquery-ui/jquery-ui.structure.min.css">
   <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
   <style>
      * {
         font-family: 'Inter', sans-serif;
      }

      .img-square {
         border: 1px solid #595959;
      }

      /* #map {
         height: 280px;
         width: 100%;
         z-index: 0;
      } */

      .map-responsive {
         overflow: hidden;
         padding-bottom: 56.25%;
         position: relative;
         height: 0;
      }

      .map-responsive iframe {
         left: 0;
         top: 0;
         height: 100%;
         width: 100%;
         position: absolute;
      }

      .info-box-content {
         overflow-y: auto !important;
      }

      .subhead::first-letter {
         -webkit-initial-letter: 2 1;
         initial-letter: 2 1;
         color: limegreen;
         font-weight: bold;
         margin-right: .75em;
      }

      /* width */
      ::-webkit-scrollbar {
         width: 11px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
         background-color: transparent;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
         background-color: #d6dee1;
         border-radius: 11px;
         border: 2px solid transparent;
         background-clip: content-box;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
         background-color: #a8bbbf;
      }

      .dialogWithDropShadow {
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      }

      .txt:hover {
         text-decoration: underline;
      }

      .nav-link:hover {
         color: #343a40 !important;
      }

      .ui-widget-overlay {
         opacity: .20 !important;
         filter: Alpha(Opacity=50) !important;
         background: rgb(50, 50, 50) !important;
      }

      .ui-dialog .ui-dialog-title {
         text-align: center;
         width: 100%;
         color: #FFFFFF;
      }

      .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
         text-align: center;
         float: none;
      }

      .ui-dialog-buttonset {
         width: 100%
      }

      .ui-dialog-buttonset .ui-button:first-child {
         float: left !important;
         margin-left: 5px;
         display: block;
         width: 46%;
      }

      .ui-dialog-buttonset .ui-button:last-child {
         float: right !important;
         display: block;
         width: 46%;
      }

      .ui-dialog-buttonpane {
         padding: 0px !important;

      }

      .ui-button {
         margin-top: 5px !important;
         margin-bottom: 2px !important;
      }

      .ui-dialog-titlebar-close {
         display: none;
      }

      .container {
         width: 95%;
         padding-left: 3%;
         padding-right: 3%;
      }

      .card1 {
         transition: all 0.20s ease-in-out !important;
      }

      .card1:hover {
         transform: scale(1.01);
         box-shadow: 0 10px 10px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06) !important;
         /* cursor: pointer; */
         transition: all 0.40s ease-in !important;
      }

      .attachment-block {
         transition: all 0.40s ease-in-out !important;
      }

      .attachment-block:hover {
         transform: scale(1.02);
         box-shadow: 0 2px 4px rgba(0, 0, 0, .04), 0 1px 2px rgba(0, 0, 0, .02);
         transition: all 0.40s ease-in-out !important;
      }

      .scrollable {
         overflow-y: auto;
         overflow-x: hidden;
         max-height: 300px;
      }

      .card {
         transition: .3s;
      }

      .card-img {
         width: 100%;
         height: 22vh;
         object-fit: contain;
      }

      .center-cropped {
         object-fit: cover;
         object-position: center;
         max-height: 300px;
         width: 100%;
      }

      /* .card-1 {
         background-image: url(admin/assets/img/cardbg1.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      }

      .card-2 {
         background-image: url(admin/assets/img/cardbg2.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      }

      .card-3 {
         background-image: url(admin/assets/img/cardbg3.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      }

      .card-4 {
         background-image: url(admin/assets/img/cardbg4.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      }

      .card-5 {
         background-image: url(admin/assets/img/cardbg5.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      }

      .card-6 {
         background-image: url(admin/assets/img/cardbg6.png);
         background-repeat: no-repeat;
         background-color: white;
         background-position: right;
         background-size: 80px;
         max-height: fit-content;
      } */

      /* .card9 {
         box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
         transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
         padding: 14px 80px 18px 36px;
         border-radius: 6px;
      } */

      .welcome {
         font-size: 1.05rem;
      }

      /* .quote-custom {
         position: relative;
         font-size: 1rem;
      }

      .quote-custom-icon {
         width: 38px;
         height: 38px;
         border-radius: 30%;
         display: flex;
         align-items: center;
         justify-content: center;
         position: absolute;
         top: -16px;
         left: 40px;
      } */
      .subject-1 {
         overflow: hidden !important;
         white-space: nowrap;
         text-overflow: ellipsis;
         white-space: nowrap;

         @supports (-webkit-line-clamp: 2) {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: initial;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
         }
      }
   </style>
</head>

<body class="hold-transition layout-top-nav bg-light">
   <div class="wrapper">
      <!-- <div class="container"> -->
      <?php include 'halaman/nav.php'; ?>
      <!-- </div> -->
      <div class="content mt-1">
         <div class="container">
            <?php if (!isset($_GET['halaman'])) : ?>

               <div class="row">




                  <!-- CUSTOM BLOCKQUOTE -->
                  <blockquote class="card bg-white border elevation-0">
                     <!-- <div class="quote-custom-icon bg-primary shadow-sm"><i class="fa fa-quote-left text-white"></i></div> -->
                     <div class="row align-items-center">
                        <div class="col-md-4">
                           <img src="admin/assets/img/welcome.png" class="card-img p-0" alt="">
                        </div>
                        <div class="col-md-8">
                           <div class="card-body">
                              <i class="fa fa-quote-left fa-2x fa-pull-left fa-border border-0 text-secondary" aria-hidden="true"></i>
                              <p class="welcome">Selamat datang di Sistem Informasi Manajemen Kelurahan. Ini adalah sistem yang memungkinkan penduduk Kelurahan Rinegetan untuk mencari informasi dengan lebih cepat dengan memanfaatkan Internet. Sistem ini diharapkan dapat memberi kemudahan setiap warga untuk melakukan aktivitas atau keperluan yang berkaitan dengan administrasi di kantor kelurahan. Selamat menggunakan fasilitas ini.</p>
                              <p class="card-text"><small class="text-muted">~ Perangkat Kerja Kelurahan Rinegetan</small></p>
                           </div>
                        </div>
                     </div>
                  </blockquote>





                  <!-- <div class="card">
                     <div class="row no-gutters">
                        <div class="col-md-4">
                           <img src="admin/assets/img/welcome.jpg" class="card-img p-1" alt="">
                        </div>
                        <div class="col-md-8">
                           <div class="card-body">
                              Selamat datang di Sistem Informasi Manajemen Kelurahan. Ini adalah sistem yang memungkinkan penduduk Kelurahan Rinegetan untuk mencari informasi dengan lebih cepat dengan memanfaatkan Internet. Sistem ini diharapkan dapat memberi kemudahan setiap warga untuk melakukan aktivitas yang berkaitan dengan administrasi di kantor kelurahan. Selamat menggunakan fasilitas ini.
                              <p class="card-text"><small class="text-muted">~Perangkat Kerja Kelurahan Rinegetan</small></p>
                           </div>
                        </div>
                     </div>
                  </div> -->

               </div>

            <?php endif ?>
            <div class="row mt-3">
               <div class="col-lg-8">
                  <?php
                  if (isset($_GET['halaman'])) {
                     if ($_GET['halaman'] == "penduduk") {
                        include 'penduduk.php';
                     } elseif ($_GET['halaman'] == "layanansurat") {
                        include 'halaman/layanan_surat.php';
                     } elseif ($_GET['halaman'] == "infopenduduk") {
                        include 'halaman/info_penduduk.php';
                     } elseif ($_GET['halaman'] == "bantuan") {
                        include 'halaman/bantuan.php';
                     } elseif ($_GET['halaman'] == "stafkelurahan") {
                        include 'halaman/staf_kelurahan.php';
                     } elseif ($_GET['halaman'] == "formsurat1") {
                        include 'halaman/formsurat1.php';
                     } elseif ($_GET['halaman'] == "formsurat2") {
                        include 'halaman/formsurat2.php';
                     } elseif ($_GET['halaman'] == "formsurat3") {
                        include 'halaman/formsurat3.php';
                     } elseif ($_GET['halaman'] == "formsurat4") {
                        include 'halaman/formsurat4.php';
                     } elseif ($_GET['halaman'] == "formsurat5") {
                        include 'halaman/formsurat5.php';
                     } elseif ($_GET['halaman'] == "formsurat6") {
                        include 'halaman/formsurat6.php';
                     } elseif ($_GET['halaman'] == "formsurat7") {
                        include 'halaman/formsurat7.php';
                     } elseif ($_GET['halaman'] == "formsurat8") {
                        include 'halaman/formsurat8.php';
                     } elseif ($_GET['halaman'] == "detailpengumuman") {
                        include 'halaman/detailpengumuman.php';
                     } else {
                        include 'halaman/errordocument.php';
                     }
                  } else {
                     include 'halaman/home.php';
                  }
                  ?>
               </div>

               <div class="col-lg-4">
                  <div class="card border elevation-0 ">
                     <div class="card-header mb-2">
                        <h3 class="card-title text-secondary"><i class="far fa-bell mr-2 text-primary"></i><strong>Informasi Kelurahan</strong></h3>
                     </div>
                     <div class="card-body pt-1 pl-2 pr-2 scrollable">
                        <div class="row">
                           <?php $take = $connect->query("SELECT * FROM publikasi ORDER BY id_berita DESC"); ?>
                           <?php while ($row = $take->fetch_assoc()) { ?>
                              <!-- <div class="col-md-12">
                                 <div class="info-box bg-light card1 p-0">
                                    <span class="info-box-icon">
                                       <img class="img" src="gambar_berita/<?php echo $row['gambar']; ?>" onerror="this.onerror=null; this.src='admin/assets/img/1648269161511.png'" alt="" style="max-height: 58px;">
                                    </span>
                                    <div class="info-box-content">
                                       <span class="info-box-text"><?php echo $row['judul']; ?></span>
                                       <span class="info-box-text text-xs text-muted mt-1"><i class="far fa-calendar-check fa-sm mr-1 text-muted"></i><?php echo date_format(new DateTime($row['waktu']), "d-M-Y"); ?> </span>
                                       <span class="progress-description text-right">
                                          <a href="index.php?halaman=detailpengumuman&id=<?php echo $row['id_berita']; ?>" class="small-box-footer text-sm text-primary pr-2">
                                             More info <i class="fas fa-link fa-xs ml-1"></i>
                                          </a>
                                       </span>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-12 d-flex align-items-stretch flex-column">
                                 <div class="attachment-block clearfix mb-2">
                                    <img class="attachment-img" src="gambar_berita/<?php echo $row['gambar']; ?>" onerror="this.onerror=null; this.src='admin/assets/img/1648269161511.png'" alt="" style="max-height: 60px;">
                                    <div class="attachment-pushed">
                                       <h5 class="attachment-heading text-muted text-sm"><?php echo $row['judul']; ?></h5>
                                       <hr style="margin: 3px;">
                                       <div class="attachment-text">
                                          <i class="far fa-calendar-check fa-xs mr-1"></i><small> <?php echo date_format(new DateTime($row['waktu']), "d-M-Y"); ?></small>
                                       </div>
                                       <span class="progress-description float-right">
                                          <a href="index.php?halaman=detailpengumuman&id=<?php echo $row['id_berita']; ?>" class="small-box-footer text-sm text-primary pr-2">
                                             More info <i class="fas fa-link fa-xs ml-1"></i>
                                          </a>
                                       </span>
                                    </div>
                                 </div>
                              </div> -->

                              <div class="col-md-12 d-flex align-items-stretch flex-column">
                                 <div class="card card1 bg-light border elevation-0">
                                    <div class="row g-0">
                                       <div class="col-4 position-relative" style="height: 80px;">
                                          <img src="gambar_berita/<?php echo $row['gambar']; ?>" class="card-img fit-cover w-100 h-100" onerror="this.onerror=null; this.src='admin/assets/img/1648269161511.png'" alt="" style="object-fit: cover; width: 100%; height: 100%;">
                                       </div>

                                       <div class="col-8">
                                          <div class="card-body p-1 mr-1">



                                             <h6 class="subject-1 mt-1"><?php echo $row['judul']; ?></h6>
                                             <hr style="margin: 2px;">

                                             <span class="far fa-calendar-check fa-xs mr-1 text-info pull-left"></span><small><?php echo date_format(new DateTime($row['waktu']), "d-M-Y"); ?></small>

                                             <span class="progress-description float-right">
                                                <a href="index.php?halaman=detailpengumuman&id=<?php echo $row['id_berita']; ?>" class="small-box-footer text-sm text-success pr-2">
                                                   More info <i class="fas fa-link fa-xs ml-1"></i>
                                                </a>
                                             </span>
                                          </div>

                                          <!-- <div class="card-footer">
                                             Last updated today.
                                          </div> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>


                           <?php } ?>



                        </div>
                     </div>
                  </div>

                  <?php if (isset($_SESSION['user'])) : ?>
                     <div class="card border elevation-0">
                        <div class="card-header border-0">
                           <h3 class="card-title text-secondary"><i class="far fa-user mr-2 text-primary"></i><strong>Login sebagai</strong></h3>
                        </div>
                        <div class="card-body p-2">
                           <?php
                           $nik = $_SESSION['nik']; //mengambil nik saat login
                           $take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE nik = '$nik'");
                           $row = $take->fetch_assoc();
                           ?>
                           <!-- <dl class="row">
                              <dt class="col-sm-5">NIK</dt>
                              <dd class="col-sm-7"><?php echo $row['nik']; ?></dd>
                              <dt class="col-sm-5">Nama</dt>
                              <dd class="col-sm-7"><?php echo $row['nama']; ?></dd>
                              <dt class="col-sm-5">TTL</dt>
                              <dd class="col-sm-7"><?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?></dd>
                              <dt class="col-sm-5">Jenis Kelamin</dt>
                              <dd class="col-sm-7"><?php echo $row['jenis_kelamin']; ?></dd>
                              <dt class="col-sm-5">Agama</dt>
                              <dd class="col-sm-7"><?php echo $row['agama']; ?></dd>
                              <dt class="col-sm-5">Alamat</dt>
                              <dd class="col-sm-7"><?php echo $row['alamat']; ?></dd>
                              <dt class="col-sm-5">Pekerjaan</dt>
                              <dd class="col-sm-7"><?php echo $row['pekerjaan']; ?></dd>
                              <dt class="col-sm-5">No. Telp</dt>
                              <dd class="col-sm-7"><?php echo $row['tlpn_user']; ?></dd>
                           </dl> -->
                           <table class="table table-bordered table-sm mb-0">
                              <tbody>
                                 <tr>
                                    <th scope="row" style="width: 34%" class="bg-light text-sm">NIK</th>
                                    <td><?php echo $row['nik']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">Nama</th>
                                    <td><?php echo $row['nama']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">TTL</th>
                                    <td><?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">Jenis Kelamin</th>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">Agama</th>
                                    <td><?php echo $row['agama']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">Alamat</th>
                                    <td><?php echo $row['alamat']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">Pekerjaan</th>
                                    <td><?php echo $row['pekerjaan']; ?></td>
                                 </tr>
                                 <tr>
                                    <th scope="row" class="bg-light text-sm">No. Hp</th>
                                    <td>
                                       <?php echo $row['tlpn_user']; ?>

                                       <!-- <a href="whatsapp://send?phone=62<?php echo $row['tlpn_staf']; ?>&text=test" class="btn btn-sm text-danger">
                                       <i class="far fa-lg fa-comment-alt"></i>
                                    </a> -->

                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  <?php endif ?>

                  <div class="card border elevation-0">
                     <div class="card-body box-profile">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="text-left mb-3">
                                 <img class="profile-user-img img-fluid border" src="admin/assets/img/logominahasa.png" alt="">
                              </div>
                           </div>
                           <div class="col-md-7">

                              <?php
                              $info = $connect->query("SELECT * FROM info_kelurahan WHERE id='123'");
                              $detail = $info->fetch_assoc();
                              ?>
                              <h3 class="text-left text-sm">KELURAHAN RINEGETAN</h3>

                              <i class="fas fa-map-marker-alt mr-1 text-muted"></i><small class="text-muted text-left m-0">Alamat Kantor :</small>
                              <p class="text-muted text-left m-0">Lingkungan IV, Jl.Pasar</p>
                              <p class="text-muted text-left m-0">Kelurahan Rinegetan</p>
                              <p class="text-muted text-left m-0">Kecamatan Tondano Barat</p>
                              <p class="text-muted text-left m-0">Kabupaten Minahasa</p>
                              <p class="text-muted text-left m-0">Kode Pos: 95617</p>
                              <i class="far fa-clock mr-1 text-muted"></i><small class="text-muted"> 7:30 S/D 16:00</small>
                              <br>
                              <i class="fas fa-phone mr-1 text-muted"></i><small class="text-muted"> <?php echo $detail['tlpn_kelurahan']; ?></small>
                              <br>
                              <i class="fas fa-envelope mr-1 text-muted"></i><small class="text-muted"> <?php echo $detail['email_kelurahan']; ?></small>

                           </div>
                        </div>
                        <!-- <ul class="list-group list-group-unbordered mb-3">
                           <li class="list-group-item">
                              <b>Followers</b> <a class="float-right">1,322</a>
                           </li>
                           <li class="list-group-item">
                              <b>Following</b> <a class="float-right">543</a>
                           </li>
                           <li class="list-group-item">
                              <b>Friends</b> <a class="float-right">13,287</a>
                           </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                     </div>
                     <!-- /.card-body -->
                  </div>
               </div>


            </div>
         </div>
      </div>
   </div>
   <?php include 'halaman/script.php'; ?>
</body>

</html>