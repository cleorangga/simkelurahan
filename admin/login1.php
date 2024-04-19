<?php
session_start();
include 'connect.php';
if (isset($_SESSION['admin'])) {
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
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page pb-5">
   <div class="login-box">
      <div class="card elevation-0">
         <div class="card-body login-card-body">
            <p class="login-box-msg" style="font-size: 54px; color: Dodgerblue;"><i class="far fa-user-circle"></i></p>
            <form role="form" method="post">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <input type="password" class="form-control" name="pass" placeholder="Password">
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
   </div>
</body>

</html>