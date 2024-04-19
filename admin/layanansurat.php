<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div class="card card-light">
   <div class="card-header">
      <h3 class="card-title"><strong>LAYANAN SURAT</strong></h3>
      <div class="card-tools">
         <a href="index.php?halaman=tambahsurat" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
         <a href="index.php?halaman=infokelurahan" class="btn btn-tool">
            <i class="fa fa-cogs fa-lg"></i>
         </a>
      </div>
   </div>
   <div class="card-body table-responsive table-sm p-2">
      <table id="datasurat" class="table table-bordered table-head-fixed text-nowrap">
         <thead>
            <tr>
               <th class="text-center">#</th> <!-- JGN TAMBAH CLASS NOTEXPORT -->
               <th class="text-center">Jenis Surat</th>
               <th class="text-center">nomor surat</th>
               <th class="text-center">NIK</th>
               <th class="text-center">Nama</th>
               <th class="text-center">Tanggal</th>
               <th style="width: 10%;" class="text-center notexport">Pilihan</th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM tb_surat JOIN pengguna ON tb_surat.id_pengguna=pengguna.id_pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk ORDER BY id_surat DESC"); ?>
            <?php while ($row = $take->fetch_assoc()) { ?>
               <?php $status = $row['status_surat']; ?>
               <?php $tglsurat = $row['tanggal_surat']; ?>
               <tr>
                  <td class="text-center"></td>
                  <td><?php echo $row['jenis_surat']; ?></td>
                  <td><?php echo $row['nomor_surat']; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <?php if ($tglsurat == '0000-00-00') : ?>
                     <td class="text-danger"><?php echo $row['tanggal_surat']; ?></td>
                  <?php else : ?>
                     <td><?php echo $row['tanggal_surat']; ?></td>
                  <?php endif ?>
                  <td>
                     <a href="index.php?halaman=detailsurat&id=<?php echo $row['id_surat']; ?>" class="mr-3 btn btn-default btn-sm"><i class="fa fa-edit mr-1"></i>Tindak Lanjuti</a>
                     <?php if ($status == '1') : ?>
                        <div class="icheck-success d-inline mr-1">
                           <input type="radio" id="checkboxPrimary2" checked>
                           <label for="checkboxPrimary2">
                           </label>
                        </div>
                     <?php elseif ($status == '0') : ?>
                        <div class="icheck-success d-inline mr-1">
                           <input type="radio" id="checkboxPrimary2" disabled>
                        </div>
                     <?php endif ?>
                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>