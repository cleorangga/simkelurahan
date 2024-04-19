<?php
session_start();
include 'halaman/connect.php';
if (isset($_SESSION['user'])) {
   echo "<script>alert('Anda sudah login');</script>";
   echo "<script>location='index.php';</script>";
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Log in</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <link rel="stylesheet" href="admin/assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page pb-5">
   <div class="login-box">
      <div class="card elevation-0">
         <div class="card-body login-card-body">
            <p class="login-box-msg" style="font-size: 54px; color: Dodgerblue;"><i class="far fa-user-circle"></i></p>
            <form role="form" method="post">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="nik" placeholder="NIK">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-id-card"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <input type="password" class="form-control" name="pass" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" placeholder="PIN">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-key"></span>
                     </div>
                  </div>
               </div>
               <div class="text-center mx-5">
                  <button class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
               </div>
            </form>


            <?php

            // if (isset($_POST['login'])){
            //    $nik = $_POST['nik'];
            //    $password = $_POST['pass'];
            //    $take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE nik = '$nik'");
            //    if ( mysqli_num_rows($take) === 1 ){
            //       $row = mysqli_fetch_assoc($take);
            //      if ( password_verify($password, $row['password_user'])){
            //       $_SESSION['user'] = $row;
            //       $_SESSION['idpengguna'] = $row['id_pengguna'];
            //       $_SESSION['namapengguna'] = $row['nama'];
            //       echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            //      }

            //    }


            // }



            // 
            ?>



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
   </div>
</body>

</html>