<?php
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>

<div id="dialog" title="Hapus" style="display: none;" class="text-center">
<p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus data publikasi ?</p>
</div>
<div class="card card-light mx-4 my-2">
   <div class="card-header">
      <h3 class="card-title"><strong>PUBLIKASI</strong></h3>
      <div class="card-tools">
         <a href="index.php?halaman=tambahberita" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
      </div>
   </div>
   <div class="card-body p-2">
      <table class="table projects table-bordered table-responsive">
         <thead>
            <tr>
               <th style="width: 1%">
                  #
               </th>
               <th>
                  Judul
               </th>
               <th style="width: 8%">
                  Foto
               </th>
               <th style="width: 14%">
               </th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM publikasi") ?>
            <?php while ($row = $take->fetch_assoc()) { ?>
               <tr>
                  <td>
                     <?php echo $nomor; ?>
                  </td>
                  <td>
                     <strong>
                        <?php echo $row['judul']; ?>
                     </strong>
                     <br />
                     <small>
                        Created <?php echo $row['waktu']; ?>
                     </small>
                  </td>
                  <td>
                     <img alt="" src="../gambar_berita/<?php echo $row['gambar']; ?>" width="60">
                  </td>
                  <td class="text-center">
                     <div class="btn-group btn-group-sm">
                        <a href="index.php?halaman=editberita&id=<?php echo $row['id_berita']; ?>" class="btn btn-default mr-2"><i class="fas fa-edit text-success mr-1"></i>Edit</a>
                        <a href="index.php?halaman=hapusberita&id=<?php echo $row['id_berita']; ?>" class="btn btn-default btn-sm confirmLink"><i class="fas fa-trash-alt text-danger mr-1"></i>Hapus</a>
                     </div>
                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>