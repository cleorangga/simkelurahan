<?php
session_start();
include 'connect.php';
if (isset($_SESSION['admin'])) {
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
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/adminlte.min.css">
   <style>
      .login,
      .image {
         min-height: 100vh;
      }

      .bg-image {
         background-image: linear-gradient(to left, rgba(248, 249, 250) 5%, rgba(255, 0, 0, 0) 100%), url('assets/img/kantorlurah.png');
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
                     <p class="text-muted mb-4">Login ke Sistem Informasi Manajemen Kelurahan sebagai Admin</p>
                     <form role="form" method="post">
                        <div class="form-group mb-3">
                           <input name="username" type="text" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                        </div>
                        <div class="form-group mb-3">
                           <input name="pass" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                        </div>
                        <button name="login" class="btn btn-success btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>
                        <div class="text-center text-sm d-flex justify-content-between mt-4">
                           <!-- <p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted">
                                 <u>Boostrapious</u></a></p> -->
                        </div>
                     </form>
                     <?php
                     if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['pass'];

                        $take = $connect->query("SELECT * FROM admin WHERE username = '$username'");
                        $matched = $take->num_rows;
                        if ($matched == 1) {
                           $akun = $take->fetch_assoc();
                           if (password_verify($password, $akun['password'])) {
                              $_SESSION['admin'] = $akun;
                              $_SESSION['idadmin'] = $akun['id_admin'];
                              // $_SESSION['admin'] = true;
                              echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-unlock-alt text-success'></i>Login Sukses !</div>";
                              echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                           } else {
                              echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-ban text-danger'></i>Password salah !</div>";
                              echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                           }
                        } else {
                           echo "<div class='mt-3 alert alert-light mx-5 text-center font-weight-bold'><i class='icon fas fa-ban text-danger'></i>Login gagal !</div>";
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