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
   <link rel="stylesheet" href="assets/surat5/base.min.css" />
   <link rel="stylesheet" href="assets/surat5/fancy.min.css" />
   <link rel="stylesheet" href="assets/surat5/main.css" />
   <script src="assets/surat5/compatibility.min.js"></script>
   <script src="assets/surat5/theViewer.min.js"></script>
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
         <div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="assets/surat5/bg1.png" />
            <div class="c x1 y1 w0 h2">
               <div class="t m0 x2 h3 y2 ff1 fs0 fc0 sc0 ls0 ws0">PEMERINTAH KABUPATEN MINAHASA</div>
               <div class="t m0 x3 h3 y3 ff1 fs0 fc0 sc0 ls0 ws0">KECAMATAN TONDANO BARAT</div>
               <div class="t m0 x4 h4 y4 ff1 fs1 fc0 sc0 ls0 ws0">KANTOR LURAH RINEGETAN</div>
               <div class="t m0 x5 h5 y5 ff2 fs2 fc0 sc0 ls0 ws0">Alamat: Lingkungan IV, Kelurahan Rinegetan, Kode Pos. 95617</div>
            </div>
            <div class="t m0 x6 h6 y6 ff3 fs3 fc0 sc0 ls0 ws0">SURAT KETERANGAN TIDAK MAMPU</div>
            <div class="t m0 x7 h7 y7 ff4 fs4 fc0 sc0 ls0 ws0">Nomor: <?php echo $row['nomor_surat']; ?></div>
            <div class="t m0 x8 h7 y8 ff4 fs4 fc0 sc0 ls0 ws0">Yang <span class="_ _0"></span>bertanda <span class="_ _0"></span>tangan <span class="_ _0"></span>di <span class="_ _0"></span>bawah <span class="_ _0"></span>ini <span class="_ _0"></span>Kepala <span class="_ _0"></span>Kelurahan <span class="_ _0"></span>Rinegetan, <span class="_ _0"></span>Kecamatan <span class="_ _0"></span>Tondano </div>
            <div class="t m0 x9 h7 y9 ff4 fs4 fc0 sc0 ls0 ws0">Barat, Kabupaten Minahasa, dengan ini menerangkan bahwa:</div>
            <div class="t m0 x8 h7 ya ff4 fs4 fc0 sc0 ls0 ws0">Nama<span class="_ _1"> </span>: <?php echo strtoupper($row['nama']); ?></div>
            <div class="t m0 x8 h7 yb ff4 fs4 fc0 sc0 ls0 ws0">NIK<span class="_ _2"> </span>: <?php echo $row['nik']; ?></div>
            <div class="t m0 x8 h7 yc ff4 fs4 fc0 sc0 ls0 ws0">Tempat/Tgl Lahir<span class="_ _3"> </span>: <?php echo $row['tempat_lahir']; ?>, <?php echo date_format($tgllahir, "d-m-Y") ?></div>
            <div class="t m0 x8 h7 yd ff4 fs4 fc0 sc0 ls0 ws0">Jenis Kelamin<span class="_ _4"> </span>: <?php echo $row['jenis_kelamin']; ?></div>
            <div class="t m0 x8 h7 ye ff4 fs4 fc0 sc0 ls0 ws0">Agama<span class="_ _5"> </span>: <?php echo $row['agama']; ?></div>
            <div class="t m0 x8 h7 yf ff4 fs4 fc0 sc0 ls0 ws0">Pekerjaan<span class="_ _6"> </span>: <?php echo $row['pekerjaan']; ?></div>
            <div class="t m0 x8 h7 y10 ff4 fs4 fc0 sc0 ls0 ws0">Alamat<span class="_ _7"> </span>: <?php echo $row['alamat']; ?></div>
            <div class="t m0 x8 h7 y11 ff4 fs4 fc0 sc0 ls0 ws0">Nama <span class="_ _8"></span>tersebut <span class="_ _8"></span>adalah <span class="_ _8"></span>benar <span class="_ _8"></span>penduduk <span class="_ _8"></span>desa <span class="_ _8"></span>kami <span class="_ _8"></span>yang <span class="_ _8"></span>berdomisili <span class="_ _8"></span>sesuai <span class="_ _8"></span>di <span class="_ _8"></span>alamat <span class="_ _8"></span>yang </div>
            <div class="t m0 x9 h7 y12 ff4 fs4 fc0 sc0 ls0 ws0">tertulis diatas <span class="_ _9"></span>dan berdasarkan <span class="_ _9"></span>pengamatan yang <span class="_ _9"></span>telah kami <span class="_ _9"></span>lakukan, yang <span class="_ _9"></span>bersangkutan benar </div>
            <div class="t m0 x9 h7 y13 ff4 fs4 fc0 sc0 ls0 ws0">dikategorikan berasal dari keluarga tidak mampu dengan pendapatan rata-rata keluarga:</div>
            <div class="t m0 x8 h7 y14 ff4 fs4 fc0 sc0 ls0 ws0">Rp <?php echo number_format ($row['pendapatan_keluarga']); ?> / bulan.</div>
            <div class="t m0 x9 h7 y15 ff4 fs4 fc0 sc0 ls0 ws0">Surat keterangan <span class="_ _8"></span>ini <span class="_ _8"></span>dinyatakan <span class="_ _8"></span>tidak berlaku <span class="_ _8"></span>apabila <span class="_ _8"></span>terjadi pe<span class="_ _8"></span>langgaran peraturan <span class="_ _8"></span>perundang-</div>
            <div class="t m0 x9 h7 y16 ff4 fs4 fc0 sc0 ls0 ws0">undangan <span class="_ _a"> </span>serta <span class="_ _a"> </span>apabila <span class="_ _a"> </span>terdapat <span class="_ _a"> </span>kekeliruan <span class="_ _a"> </span>atau <span class="_ _a"> </span>kesalahan <span class="_ _a"> </span>dalam <span class="_ _a"> </span>pemakaiannya, </div>
            <div class="t m0 x9 h7 y17 ff4 fs4 fc0 sc0 ls0 ws0">pemegang/pemohon yang bersangkutan bersedia mempertanggung jawabkan secara hukum.</div>
            <div class="t m0 x9 h8 y18 ff5 fs4 fc0 sc0 ls0 ws0">Surat keterangan ini berlaku untuk sekali keperluan.</div>
            <div class="t m0 x9 h7 y19 ff4 fs4 fc0 sc0 ls0 ws0">Demikian <span class="_ _b"> </span>surat <span class="_ _b"> </span>keterangan <span class="_ _b"> </span>ini <span class="_ _b"> </span>kami <span class="_ _b"> </span>buat <span class="_ _b"> </span>dengan <span class="_ _b"> </span>sebenar-benarnya <span class="_ _b"> </span>dan <span class="_ _b"> </span>untuk <span class="_ _b"> </span>dipergunakan </div>
            <div class="t m0 x9 h7 y1a ff4 fs4 fc0 sc0 ls0 ws0">sebagaimana mestinya.</div>
            <div class="c xa y1b w2 h9">
               <div class="t m0 xb h7 y1c ff4 fs4 fc0 sc0 ls0 ws0">Dikeluarkan di<span class="_ _c"> </span>: Rinegetan</div>
               <div class="t m0 xb h7 y1d ff4 fs4 fc0 sc0 ls0 ws0">Pada tanggal<span class="_ _d"> </span>: <?php echo date_format($tglsurat,"d-m-Y"); ?></div>
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