<?php
session_start();
include 'halaman/connect.php';
if (isset($_SESSION['user'])) {
   echo "<script>alert('Anda sudah login');</script>";
   echo "<script>location='index.php';</script>";
   exit();
}
?>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Log in</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <link rel="stylesheet" href="admin/assets/css/adminlte.min.css">
   <style>
      .login,
      .image {
         min-height: 100vh;
      }

      .bg-image {
         background-image: linear-gradient(to left, rgba(248, 249, 250) 5%, rgba(255, 0, 0, 0) 100%), url('admin/assets/img/kantorlurah.png');
         background-size: cover;
         background-position: center center;
      }
   </style>
</head>
<div class="container-fluid">
   <div class="row no-gutter">
      <!-- The image half -->
      <div class="col-md-6 d-none d-md-flex bg-image"></div>
      <!-- <div class="col-md-6 d-none d-md-flex bg-image"></div>  |d-none d-md-flex = hide class|   -->


      <!-- The content half -->
      <div class="col-md-6 bg-light">

         <div class="login d-flex align-items-center py-5">

            <!-- Demo content-->
            <div class="container">
               <div class="row p-4">
                  <div class="col-lg-10 col-xl-7 mx-auto">
                     <h3 class="display-4">Login!</h3>
                     <p class="text-muted mb-4">Login ke Sistem Informasi Manajemen Kelurahan sebagai Pengguna</p>
                     <form role="form" method="post">
                        <div class="form-group mb-3">
                           <input type="text" name="nik" placeholder="NIK" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                        </div>
                        <div class="form-group mb-3">
                           <input type="password" name="pass" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                        </div>
                        <button name="login" class="btn btn-success btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>
                        <div class="text-center text-sm d-flex justify-content-between mt-4">
                           <!-- <p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted">
                                 <u>Boostrapious</u></a></p> -->
                        </div>
                     </form>

                     <?php
                     if (isset($_POST['login'])) {

                        $nik = $_POST['nik'];
                        $password = $_POST['pass'];

                        $take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE nik = '$nik'");
                        // "SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE nik = '$_POST[nik]' AND password_user = '$_POST[pass]'"
                        $matched = $take->num_rows;
                        if ($matched == 1) {
                           $akun = $take->fetch_assoc();
                           if (password_verify($password, $akun['password_user'])) {
                              $_SESSION['user'] = $akun;
                              $_SESSION['idpengguna'] = $akun['id_pengguna'];
                              $_SESSION['namapengguna'] = $akun['nama'];
                              $_SESSION['nik'] = $akun['nik']; //menyimpan nik yang login ke dalam session
                              // $_SESSION['user'] = true;
                              echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-check-circle text-success'></i>Login sukses !</div>";
                              echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                           } else {
                              echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-ban text-danger'></i>Password salah !</div>";
                              echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                           }
                        } else {
                           echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-ban text-danger'></i>NIK tidak terdaftar !</div>";
                           echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                     }
                     ?>

                  </div>
               </div>
            </div><!-- End -->

         </div>
      </div><!-- End -->

   </div>
</div>