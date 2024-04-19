<nav class="main-header navbar navbar-expand-md navbar-light navbar-white border-0 bg-transparent">


   <div class="container mt-2">

      <a href="index.php" class="navbar-brand p-0">
         
         <img src="admin/assets/img/simkelurahanlogo.png" class="brand-image img-square border-0" style="opacity: .9">
         <!-- <img src="admin/assets/img/logo3.png" height="60" class=""> -->
         <!-- <i class="fas fa-2x fa-mail-bulk text-muted"></i> -->
         <!-- <span class="brand-text ml-2 text-muted" style="font-size: xx-large;"><strong>ABCD</strong></span> -->
       
      </a>
      <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a href="index.php" class="nav-link"><strong>Beranda</strong></a>
            </li>
            <?php if (!isset($_SESSION['user'])) : ?>
               <div id="login" title="Login" style="display: none;" class="text-center">
               <p><i class="fas fa-exclamation-triangle text-danger"></i> <br> anda harus login untuk mengakses halaman ini</p>
               </div>
               <li class="nav-item">
                  <a href="index.php?halaman=layanansurat" class="nav-link confirmLogin"><strong>Layanan Surat</strong></a>
               </li>
            <?php else : ?>
               <li class="nav-item">
                  <a href="index.php?halaman=layanansurat" class="nav-link"><strong>Layanan Surat</strong></a>
               </li>
            <?php endif ?>
            <!-- <li class="nav-item dropdown">
               <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><Strong>Infografis</Strong></a>
               <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="index.php?halaman=infopenduduk" class="dropdown-item">Kependudukan</a></li>
                  <li><a href="index.php?halaman=bantuan" class="dropdown-item">Bantuan</a></li>
                  <li><a href="index.php?halaman=stafkelurahan" class="dropdown-item">Kontak</a></li>
               </ul>
            </li> -->
            <li class="nav-item">
               <a href="index.php?halaman=infopenduduk" class="nav-link"><strong>Infografis</strong></a>
            </li>
            <li class="nav-item">
               <a href="index.php?halaman=stafkelurahan" class="nav-link"><strong>Kontak</strong></a>
            </li>
            <li class="nav-item">
               <a href="index.php?halaman=bantuan" class="nav-link"><strong>Bantuan</strong></a>
            </li>
            <?php if (isset($_SESSION['user'])) : ?>
               <div id="logout" title="Logout" style="display: none;" class="text-center">
               <p><i class="fas fa-exclamation-triangle text-danger"></i> <br> kembali ke halaman awal ?</p>
               </div>
               <li class="nav-item">
                  <a href="logout.php" class="nav-link text-danger confirmLogout"><strong>Logout</strong></a>
               </li>
            <?php else : ?>
               <li class="nav-item">
                  <a href="login.php" class="nav-link text-success"><strong>Login</strong></a>
               </li>
            <?php endif ?>
         </ul>
      </div>

   </div>

</nav>