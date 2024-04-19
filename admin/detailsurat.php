<?php
function getRomawi($bln)
{
   switch ($bln) {
      case 1:
         return "I";
         break;
      case 2:
         return "II";
         break;
      case 3:
         return "III";
         break;
      case 4:
         return "IV";
         break;
      case 5:
         return "V";
         break;
      case 6:
         return "VI";
         break;
      case 7:
         return "VII";
         break;
      case 8:
         return "VIII";
         break;
      case 9:
         return "IX";
         break;
      case 10:
         return "X";
         break;
      case 11:
         return "XI";
         break;
      case 12:
         return "XII";
         break;
   }
}
?>
<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$take = $connect->query("SELECT * FROM tb_surat JOIN pengguna ON tb_surat.id_pengguna=pengguna.id_pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE tb_surat.id_surat='$_GET[id]'");
$row = $take->fetch_assoc();
$jenissurat = $row['jenis_surat'];
$status = $row['status_surat'];
?>

<?php
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun = date('Y');
$nomorsku = "/503.1/" . $romawi . "/" . $tahun;
$nomorskp = "/140/" . $romawi . "/" . $tahun;
$nomorskck = "/140/" . $romawi . "/" . $tahun;
$nomorsik = "/300/" . $romawi . "/" . $tahun;
$nomorsktm = "/463/" . $romawi . "/" . $tahun;
$nomorskd = "/420/" . $romawi . "/" . $tahun;
$nomorskbm = "/474.1/" . $romawi . "/" . $tahun;
$nomorktp = "/474/" . $romawi . "/" . $tahun;


// query untuk ambil nomor surat
$sku = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Keterangan Usaha' ORDER BY id_surat DESC LIMIT 1");
$result1 = $sku->fetch_assoc();
$skp = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Keterangan Penghasilan' ORDER BY id_surat DESC LIMIT 1");
$result2 = $skp->fetch_assoc();
$skck = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Pengantar SKCK' ORDER BY id_surat DESC LIMIT 1");
$result3 = $skck->fetch_assoc();
$sik = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Izin Keramaian' ORDER BY id_surat DESC LIMIT 1");
$result4 = $sik->fetch_assoc();
$sktm = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Keterangan Tidak Mampu' ORDER BY id_surat DESC LIMIT 1");
$result5 = $sktm->fetch_assoc();
$skd = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Keterangan Domisili' ORDER BY id_surat DESC LIMIT 1");
$result6 = $skd->fetch_assoc();
$skbm = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Keterangan Belum Menikah' ORDER BY id_surat DESC LIMIT 1");
$result7 = $skbm->fetch_assoc();
$ktp = $connect->query("SELECT nomor_surat FROM tb_surat WHERE jenis_surat='Surat Pengantar KTP' ORDER BY id_surat DESC LIMIT 1");
$result8 = $ktp->fetch_assoc();
// <!-- NOMOR OTOMATIS -->
if ($jenissurat == 'Surat Keterangan Usaha') {
   $nmrsku = intval($result1['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Keterangan Penghasilan') {
   $nmrskp = intval($result2['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Pengantar SKCK') {
   $nmrskck = intval($result3['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Izin Keramaian') {
   $nmrsik = intval($result4['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') {
   $nmrsktm = intval($result5['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Keterangan Domisili') {
   $nmrskd = intval($result6['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Keterangan Belum Menikah') {
   $nmrskbm = intval($result7['nomor_surat']) + 1;
} elseif ($jenissurat == 'Surat Pengantar KTP') {
   $nmrktp = intval($result8['nomor_surat']) + 1;
}
?>

<div id="dialog" title="Hapus" style="display: none;" class="text-center">
   <p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus surat atas nama <strong> <?php echo $row['nama']; ?> </strong></p>
</div>
<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title font-weight-bold">Detail Surat </h3>
      <!-- <div class="card-tools">
         <a href="index.php?halaman=hapussurat&id=<?php echo $row['id_surat']; ?>" class="btn btn-tool btn-default border border-secondary confirmLink">
            <i class="far fa-trash-alt fa-lg text-danger mr-1"></i><strong>Hapus</strong>
         </a>
      </div> -->
   </div>
   <!-- /.card-header -->
   <form class="form" method="post" enctype="multipart/form-data">
      <div class="card-body">
         <div class="row">
            <div class="col-md-6">
               <!-- text input -->
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Jenis Surat</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="jenissurat" readonly value="<?php echo $row['jenis_surat']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">NIK</label>
                  <div class="col-sm-8">
                     <input type="number" class="form-control" name="nik" readonly value="<?php echo $row['nik']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Nama</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="nama" readonly value="<?php echo $row['nama']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Tempat Lahir</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="tempatlahir" readonly value="<?php echo $row['tempat_lahir']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Tanggal Lahir</label>
                  <div class="col-sm-8">
                     <input type="date" class="form-control" name="tanggallahir" readonly value="<?php echo $row['tanggal_lahir']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Jenis Kelamin</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="jeniskelamin" readonly value="<?php echo $row['jenis_kelamin']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Agama</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="agama" readonly value="<?php echo $row['agama']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Pekerjaan</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="pekerjaan" readonly value="<?php echo $row['pekerjaan']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Alamat/Tempat Tinggal</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="alamat" readonly value="<?php echo $row['alamat']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Telp/Hp</label>
                  <div class="col-sm-8">
                     <input type="number" class="form-control" name="telp" readonly value="<?php echo $row['tlpn_user']; ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
               <?php if ($jenissurat == 'Surat Keterangan Usaha') : ?>
                  <div class="form-group">
                     <label>Nama Usaha</label>
                     <input type="text" class="form-control" name="namausaha" value="<?php echo $row['nama_usaha']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Alamat Usaha</label>
                     <input type="text" class="form-control" name="alamatusaha" value="<?php echo $row['alamat_usaha']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Keterangan Penghasilan') : ?>
                  <div class="form-group">
                     <label>Jumlah Penghasilan (Rp)</label>
                     <input type="text" class="form-control" name="jumlahpenghasilan" value="<?php echo $row['jumlah_penghasilan']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Izin Keramaian') : ?>
                  <div class="form-group">
                     <label>Kegiatan / Acara</label>
                     <input type="text" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Waktu Kegiatan</label>
                     <input type="date" class="form-control" name="waktukegiatan" value="<?php echo $row['waktu_kegiatan']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Tempat Kegiatan</label>
                     <input type="text" class="form-control" name="tempatkegiatan" value="<?php echo $row['tempat_kegiatan']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') : ?>
                  <div class="form-group">
                     <label>Pendapatan Rata-rata Keluarga / Bulan</label>
                     <input type="text" class="form-control" name="pendapatankeluarga" value="<?php echo $row['pendapatan_keluarga']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Keterangan Domisili') : ?>
                  <div class="form-group">
                     <label>Keperluan</label>
                     <input type="text" class="form-control" name="keperluan" value="<?php echo $row['keperluan']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Keterangan Belum Menikah') : ?>
                  <div class="form-group">
                     <label>Keperluan</label>
                     <input type="text" class="form-control" name="keperluan" value="<?php echo $row['keperluan']; ?>">
                  </div>
               <?php elseif ($jenissurat == 'Surat Pengantar KTP') : ?>
                  <div class="form-group">
                     <label>Nomor KK</label>
                     <input type="text" class="form-control" name="nomorkk" value="<?php echo $row['nomor_kk']; ?>">
                  </div>
               <?php endif ?>
               <div class="form-group">
                  <label>Catatan User</label>
                  <textarea class="form-control" rows="2" placeholder="<?php echo $row['keterangan']; ?>" disabled></textarea>
               </div>
               <div class="form-group row mb-2">
                  <label class="col-sm-4">Tanggal Surat</label>
                  <div class="col-sm-8">

                     <?php if ($row['tanggal_surat'] == '0000-00-00') : ?>
                        <input type="date" class="form-control text-danger" style="font-weight: bold;" name="tanggalsurat" value="<?php echo $row['tanggal_surat']; ?>">
                     <?php else : ?>
                        <input type="date" class="form-control" name="tanggalsurat" value="<?php echo $row['tanggal_surat']; ?>">
                     <?php endif ?>
                  </div>
               </div>

               <div class="form-group row mb-2">
                  <label class="col-sm-4">Status Surat</label>
                  <div class="col-sm-8">
                     <select class="form-control select2ns" name="status">
                        <option selected value="<?php echo $status; ?>">
                           <?php if ($status == '0') : ?>
                              Pending
                           <?php elseif ($status == '1') : ?>
                              Disetujui
                           <?php endif ?>
                        </option>


                        <?php if ($status == '0') : ?>
                           <option value="1">Disetujui</option>
                        <?php elseif ($status == '1') : ?>
                           <option value="0">Pending</option>
                        <?php endif ?>
                     </select>
                  </div>
               </div>



               <div class="form-group row">
                  <label class="col-sm-4">Nomor Surat</label><!-- NOMOR OTOMATIS -->
                  <div class="col-sm-8">
                     <?php if ($jenissurat == 'Surat Keterangan Usaha') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrsku; ?><?php echo $nomorsku; ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Keterangan Penghasilan') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrskp; ?><?php echo $nomorskp ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Pengantar SKCK') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrskck; ?><?php echo $nomorskck ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Izin Keramaian') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrsik; ?><?php echo $nomorsik ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrsktm; ?><?php echo $nomorsktm ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Keterangan Domisili') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrskd; ?><?php echo $nomorskd ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Keterangan Belum Menikah') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrskbm; ?><?php echo $nomorskbm ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php elseif ($jenissurat == 'Surat Pengantar KTP') : ?>
                        <?php if ($row['nomor_surat'] == 0) { ?>
                           <input type="text" class="form-control text-danger" style="font-weight: bold;" name="nomorsurat" value="<?php echo $nmrktp; ?><?php echo $nomorktp ?>">
                        <?php } else { ?>
                           <input type="text" class="form-control" style="font-weight: bold;" name="nomorsurat" value="<?php echo $row['nomor_surat'] ?>">
                        <?php } ?>


                     <?php endif ?>
                  </div>
               </div>



            </div>
         </div>
      </div>
      <div class="card-footer bg-white border py-2 pl-2">
         <button type="submit" class="btn btn-app bg-default rounded-lg mb-0 text-dark float-right" name="save"><i class="fa fa-check-square text-info"></i><strong>Save</strong></button>
         <?php if ($jenissurat == 'Surat Keterangan Usaha') : ?>
            <a href="surat.php?halaman=cetaksurat1&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat1&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SKU</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Keterangan Penghasilan') : ?>
            <a href="surat.php?halaman=cetaksurat2&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat2&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SK Penghasilan</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Pengantar SKCK') : ?>
            <a href="surat.php?halaman=cetaksurat3&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat3&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print Pengantar SKCK</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Izin Keramaian') : ?>
            <a href="surat.php?halaman=cetaksurat4&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat4&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SIK</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') : ?>
            <a href="surat.php?halaman=cetaksurat5&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat5&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SKTM</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Keterangan Domisili') : ?>
            <a href="surat.php?halaman=cetaksurat6&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat6&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SKD</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Keterangan Belum Menikah') : ?>
            <a href="surat.php?halaman=cetaksurat7&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat7&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print SKBM</strong></a> -->
         <?php elseif ($jenissurat == 'Surat Pengantar KTP') : ?>
            <a href="surat.php?halaman=cetaksurat8&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0" target="_blank">
               <i class="fas fa-print text-primary"></i> <strong>Print</strong>
            </a>
            <!-- <a href="surat.php?halaman=cetaksurat8&id=<?php echo $row['id_surat']; ?>" class="btn btn-default border border-secondary rounded mr-1" target="_blank"><i class="fa fa-print text-primary fa-lg mr-2"></i><strong>Print Pengantar KTP</strong></a> -->
         <?php endif ?>
         <a href="whatsapp://send?phone=62<?php echo $row['tlpn_user']; ?>&text=<?php echo $row['jenis_surat']; ?> atas nama *<?php echo $row['nama']; ?>* sudah dapat diambil" class="btn btn-app bg-default rounded-lg mb-0">
            <i class="fab fa-whatsapp text-success"></i><strong>Chat</strong>
         </a>
         <a href="index.php?halaman=hapussurat&id=<?php echo $row['id_surat']; ?>" class="btn btn-app bg-default rounded-lg mb-0 confirmLink">
            <i class="far fa-trash-alt text-danger"></i><strong>Hapus</strong>
         </a>
      </div>
   </form>
</div>

<?php
if (isset($_POST['save'])) {
   if ($jenissurat == 'Surat Keterangan Usaha') {
      $namausaha = ucwords($_POST["namausaha"]); // <--- semua input (huruf pertama) jadi kapital 
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',nama_usaha='$namausaha',alamat_usaha='$_POST[alamatusaha]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Keterangan Penghasilan') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',jumlah_penghasilan='$_POST[jumlahpenghasilan]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Pengantar SKCK') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Izin Keramaian') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',kegiatan='$_POST[kegiatan]',waktu_kegiatan='$_POST[waktukegiatan]',tempat_kegiatan='$_POST[tempatkegiatan]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Keterangan Tidak Mampu') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',pendapatan_keluarga='$_POST[pendapatankeluarga]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Keterangan Domisili') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',keperluan='$_POST[keperluan]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Keterangan Belum Menikah') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',keperluan='$_POST[keperluan]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   } elseif ($jenissurat == 'Surat Pengantar KTP') {
      $connect->query("UPDATE tb_surat SET tanggal_surat='$_POST[tanggalsurat]',nomor_kk='$_POST[nomorkk]',status_surat='$_POST[status]',nomor_surat='$_POST[nomorsurat]' WHERE id_surat='$_GET[id]'");
   }
   echo "<div class='alert alert-success mt-2'><i class='icon fas fa-exclamation-triangle'></i> Data berhasil diperbarui</div>";
   echo "<meta http-equiv='refresh' content='1'>";
}
?>