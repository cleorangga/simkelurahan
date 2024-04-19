<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
$take = $connect->query("SELECT * FROM tb_surat JOIN pengguna ON tb_surat.id_pengguna=pengguna.id_pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk JOIN info_kelurahan WHERE tb_surat.id_surat='$_GET[id]'");
$row = $take->fetch_assoc();
$tgllahir = new DateTime($row['tanggal_lahir']);
$tglsurat = new DateTime($row['tanggal_surat']);
$jenissurat = $row['jenis_surat'];
?>
<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta charset="utf-8" />

   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <link rel="stylesheet" href="assets/surat4/base.min.css" />
   <link rel="stylesheet" href="assets/surat4/fancy.min.css" />
   <link rel="stylesheet" href="assets/surat4/main.css" />
   <script src="assets/surat4/compatibility.min.js"></script>
   <script src="assets/surat4/theViewer.min.js"></script>
   <script>
      try {
         theViewer.defaultViewer = new theViewer.Viewer({});
      } catch (e) {}
   </script>
   <title></title>
</head>

<body>
   <div id="sidebar">
      <div id="outline">
      </div>
   </div>
   <div id="page-container">
      <div id="pf1" class="pf w0 h0" data-page-no="1">
         <div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" src="assets/surat4/bg1.png" />
            <div class="c x1 y1 w0 h2">
               <div class="t m0 x2 h3 y2 ff1 fs0 fc0 sc0 ls0 ws0">PEMERINTAH KABUPATEN MINAHASA</div>
               <div class="t m0 x3 h3 y3 ff1 fs0 fc0 sc0 ls0 ws0">KECAMATAN TONDANO BARAT</div>
               <div class="t m0 x4 h4 y4 ff1 fs1 fc0 sc0 ls0 ws0">KANTOR LURAH RINEGETAN</div>
               <div class="t m0 x5 h5 y5 ff2 fs2 fc0 sc0 ls0 ws0">Alamat: Lingkungan IV, Kelurahan Rinegetan, Kode Pos. 95617</div>
            </div>
            <div class="t m0 x6 h6 y6 ff3 fs3 fc0 sc0 ls0 ws0">SURAT IZIN KERAMAIAN</div>
            <div class="t m0 x7 h7 y7 ff4 fs4 fc0 sc0 ls0 ws0">Nomor: <?php echo $row['nomor_surat']; ?></div>
            <div class="t m0 x8 h7 y8 ff4 fs4 fc0 sc0 ls0 ws0">Yang <span class="_ _0"></span>bertanda <span class="_ _0"></span>tangan <span class="_ _0"></span>di <span class="_ _0"></span>bawah <span class="_ _0"></span>ini <span class="_ _0"></span>Kepala <span class="_ _0"></span>Kelurahan <span class="_ _0"></span>Rinegetan, <span class="_ _0"></span>Kecamatan <span class="_ _0"></span>Tondano </div>
            <div class="t m0 x9 h7 y9 ff4 fs4 fc0 sc0 ls0 ws0">Barat, Kabupaten Minahasa, dengan ini menerangkan bahwa:</div>
            <div class="t m0 x8 h7 ya ff4 fs4 fc0 sc0 ls0 ws0">Nama<span class="_ _1"> </span>: <?php echo strtoupper($row['nama']); ?></div>
            <div class="t m0 x8 h7 yb ff4 fs4 fc0 sc0 ls0 ws0">NIK<span class="_ _2"> </span>: <?php echo $row['nik']; ?></div>
            <div class="t m0 x8 h7 yc ff4 fs4 fc0 sc0 ls0 ws0">Tempat/Tgl Lahir<span class="_ _3"> </span>: <?php echo $row['tempat_lahir']; ?>, <?php echo date_format($tgllahir,"d-m-Y"); ?></div>
            <div class="t m0 x8 h7 yd ff4 fs4 fc0 sc0 ls0 ws0">Jenis Kelamin<span class="_ _4"> </span>: <?php echo $row['jenis_kelamin']; ?></div>
            <div class="t m0 x8 h7 ye ff4 fs4 fc0 sc0 ls0 ws0">Agama<span class="_ _5"> </span>: <?php echo $row['agama']; ?></div>
            <div class="t m0 x8 h7 yf ff4 fs4 fc0 sc0 ls0 ws0">Pekerjaan<span class="_ _6"> </span>: <?php echo $row['pekerjaan']; ?></div>
            <div class="t m0 x8 h7 y10 ff4 fs4 fc0 sc0 ls0 ws0">Alamat<span class="_ _7"> </span>: <?php echo $row['alamat']; ?></div>
            <div class="t m0 x8 h7 y11 ff4 fs4 fc0 sc0 ls0 ws0">Nama <span class="_ _8"></span>tersebut <span class="_ _8"></span>adalah <span class="_ _8"></span>benar <span class="_ _8"></span>penduduk <span class="_ _8"></span>desa <span class="_ _8"></span>kami <span class="_ _8"></span>yang <span class="_ _8"></span>berdomisili <span class="_ _8"></span>sesuai <span class="_ _8"></span>di <span class="_ _8"></span>alamat <span class="_ _8"></span>yang </div>
            <div class="t m0 x9 h7 y12 ff4 fs4 fc0 sc0 ls0 ws0">tertulis diatas <span class="_ _8"></span>dan <span class="_ _8"></span>yang <span class="_ _8"></span>bersangkutan <span class="_ _8"></span>benar mengajukan <span class="_ _8"></span>pembuatan <span class="_ _8"></span>surat <span class="_ _8"></span>izin <span class="_ _8"></span>keramaian dalam </div>
            <div class="t m0 x9 h7 y13 ff4 fs4 fc0 sc0 ls0 ws0">rangka <strong><?php echo $row['kegiatan']; ?></strong> yang diadakan pada:</div>
            <div class="t m0 x8 h7 y14 ff4 fs4 fc0 sc0 ls0 ws0">Tanggal<span class="_ _9"> </span>: <?php echo $row['waktu_kegiatan']; ?></div>
            <div class="t m0 x8 h7 y15 ff4 fs4 fc0 sc0 ls0 ws0">Tempat<span class="_ _a"> </span>: <?php echo $row['tempat_kegiatan']; ?></div>
            <div class="t m0 x9 h7 y16 ff4 fs4 fc0 sc0 ls0 ws0">Demikian <span class="_ _b"> </span>surat <span class="_ _b"> </span>keterangan <span class="_ _b"> </span>dari <span class="_ _b"> </span>Kelurahan <span class="_ _b"> </span>ini <span class="_ _b"> </span>kami <span class="_ _b"> </span>buat <span class="_ _b"> </span>dengan <span class="_ _b"> </span>sebenar-benarnya <span class="_ _b"> </span>dan </div>
            <div class="t m0 x9 h7 y17 ff4 fs4 fc0 sc0 ls0 ws0">dikeluarkan dengan ketentuan:</div>
            <div class="t m0 x9 h8 y18 ff4 fs5 fc0 sc0 ls0 ws0">1)<span class="_ _c"> </span>nama yang <span class="_ _8"></span>bersangkutan bertanggung <span class="_ _8"></span>jawab memperhatikan <span class="_ _8"></span>protokol kesehat<span class="_ _8"></span>an dan <span class="_ _8"></span>keamanan</div>
            <div class="t m0 x9 h8 y19 ff4 fs5 fc0 sc0 ls0 ws0">2)<span class="_ _c"> </span>menghargai waktu ibadah untuk kerukunan dan ketenteraman lingkungan</div>
            <div class="t m0 x9 h8 y1a ff4 fs5 fc0 sc0 ls0 ws0">3)<span class="_ _c"> </span>tidak diperbolehkan melakukan hal-hal yang bertentangan dengan ketentuan dan aturan</div>
            <div class="c xa y1b w2 h9">
               <div class="t m0 xb h7 y1c ff4 fs4 fc0 sc0 ls0 ws0">Dikeluarkan di<span class="_ _d"> </span>: Rinegetan</div>
               <div class="t m0 xb h7 y1d ff4 fs4 fc0 sc0 ls0 ws0">Pada tanggal<span class="_ _e"> </span>: <?php echo date_format($tglsurat,"d-m-Y"); ?></div>
               <div class="t m0 xb h7 y1e ff4 fs4 fc0 sc0 ls0 ws0">Kepala Kelurahan Rinegetan</div>
               <div class="t m0 xb h7 y1f ff4 fs4 fc0 sc0 ls0 ws0">( <?php echo $row['nama_lurah']; ?> )</div>
               <div class="t m0 xb h7 y20 ff4 fs4 fc0 sc0 ls0 ws0">NIP. <?php echo $row['nip']; ?></div>
            </div>
         </div>
         <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
      </div>
   </div>
   <div class="loading-indicator">

   </div>
</body>

</html>