<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div id="dialog" title="Hapus" style="display: none;" class="text-center">
<p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus data akun ?</p>
</div>
<div class="card card-light">
   <div class="card-header">
      <h3 class="card-title"><strong>DATA PENGGUNA SISTEM</strong></h3>
      <div class="card-tools">
         <a href="index.php?halaman=tambahuser" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
      </div>
   </div>
   <div class="card-body table-responsive table-sm p-2">
      <table id="datapengguna" class="table table-bordered table-head-fixed">
         <thead>
            <tr>
               <th class="text-center">#</th>
               <th>NIK</th>
               <th>Nama</th>
               <th>Password</th>
               <th>Telp/Hp</th>
               <th>Opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk") ?>
            <?php while ($row = $take->fetch_assoc()) { ?>
               <tr>
                  <td class="text-center"><?php echo $nomor; ?></td>
                  <td><?php echo $row['nik']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['password_user']; ?></td>
                  <td><?php echo $row['tlpn_user']; ?></td>
                  <td class="text-center">

                     <div class="btn-group btn-group-sm">
                        <a href="index.php?halaman=edituser&id=<?php echo $row['id_pengguna']; ?>" class="btn btn-default mr-2"><i class="fas fa-cog text-success mr-1"></i>Edit</a>
                        <a href="index.php?halaman=hapususer&id=<?php echo $row['id_pengguna']; ?>" class="btn btn-default confirmLink"><i class="fas fa-trash-alt text-danger mr-1"></i>Hapus</a>
                     </div>

                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>