<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div id="dialog" title="Hapus" style="display: none;" class="text-center">
<p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus data staf ?</p>
</div>
<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>STAF KELURAHAN</strong></h3>
      <div class="card-tools">
      <a href="index.php?halaman=tambahkontak" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
      </div>
   </div>
   <div class="card-body p-2">
      <table class="table projects table-bordered table-responsive">
         <thead>
            <tr>
               <th style="width: 1%">
                  #
               </th>
               <th style="width: 20%">
                  Nama
               </th>
               <th style="width: 6%">
                  Foto
               </th>
               <th>
                  Alamat
               </th>
               <th>
                  Jabatan
               </th>
               <th style="width: 8%" class="text-center">
                  Telp/Hp
               </th>
               <th style="width: 14%">
               </th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM staf_kelurahan") ?>
            <?php while ($row = $take->fetch_assoc()) { ?>
               <tr>
                  <td>
                     <?php echo $nomor; ?>
                  </td>
                  <td>
                     <strong>
                        <?php echo $row['nama']; ?>
                     </strong>
                     <br />
                  </td>
                  <td class="text-center">
                     <img alt="" style="height: 50px;" src="../foto_admin/<?php echo $row['foto_staf']; ?>" onerror="this.onerror=null; this.src='assets/img/default.png'">
                  </td>
                  <td>
                     <?php echo $row['alamat']; ?>
                  </td>
                  <td>
                     <?php echo $row['jabatan']; ?>
                  </td>
                  <td>
                     <?php echo $row['tlpn_staf']; ?>
                  </td>
                  <td class="text-center">
                     <div class="btn-group btn-group-sm">
                        <a href="index.php?halaman=editkontak&id=<?php echo $row['id_staf']; ?>" class="btn btn-default mr-2"><i class="fas fa-edit text-success mr-1"></i>Edit</a>
                        <a href="index.php?halaman=hapuskontak&id=<?php echo $row['id_staf']; ?>" class="btn btn-default confirmLink"><i class="fas fa-trash-alt text-danger mr-1"></i>Hapus</a>
                     </div>
                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>